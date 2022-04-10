<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Biodata;
use App\Models\Opsdik;
use App\Models\Pendidikan;
use App\Models\RiwayatPekerjaan;
use App\Models\RiwayatPelatihan;
use App\Models\Seleksi;
use App\Models\Strata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function login()
    {
        $userRole = (!empty(Auth::user()->role)) ? Auth::user()->role : null;
        if (!empty($userRole)) return redirect('/dashboard');
        return view("login");
    }

    public function register()
    {
        return view("register");
    }

    public function proses_register(Request $request)
    {
        $cek = User::where("email", $request->email)->first();
        if (empty($cek)) :
            if ($request->password == $request->konfirmasi_password) :

                DB::beginTransaction();
                $user = User::create([
                    "name" => $request->email,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                    "role" => "isUser"
                ]);

                //Add Biodata
                Biodata::create([
                    "user_id" => $user->id,
                    "nama" => "-",
                    "posisi" => "-",
                    "no_ktp" => "-",
                    "tempat_lahir" => "-",
                    "tanggal_lahir" => DATE("Y-m-d"),
                    // "jenis_kelamin" => 'pria',
                    "agama" => "-",
                    "golongan_darah" => "-",
                    "status" => "-",
                    "alamat_ktp" => "-",
                    "alamat_tinggal" => "-",
                    "email" => "-",
                    "no_telepon" => "-",
                    "orang_terdekat" => "-",
                    "skill" => "-",
                    // "ditempatkan" => "-",
                    "penghasilan" => "-",
                ]);

                if (Auth::attempt(["email" => $request->email, "password" => $request->password])) :
                    $request->session()->regenerate();
                    DB::commit();
                    return redirect('/biodata');
                endif;
            else :
                return redirect('/register')->with('danger', 'Password dan Konfirmasi Password harus sama');
            endif;
        else :
            return redirect('/register')->with('danger', 'Email sudah digunakan');
        endif;
    }

    public function logout()
    {
        request()->session()->invalidate();
        return redirect('/')->with('success', 'Anda berhasil logout');
    }

    public function forbidden()
    {
        request()->session()->invalidate();
        return redirect('/')->with('danger', 'Anda tidak diizinkan mengakses halaman sebelumnya');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            return (Auth::user()->role == "isUser") ? redirect("/biodata") : redirect("pelamar");
        }

        return back()->with('danger', 'Oops! Data Login tidak valid');
    }

    public function uuid()
    {
        $count = request('count');
        $count = $count ?: 10;
        for ($i = 1; $i <= $count; $i++) :
            echo Str::uuid() . "<br>";
        endfor;
        header("Refresh: 3; URL=/generate/uuid");
    }

    public function biodata()
    {
        $biodata = Biodata::where("user_id", Auth::user()->id)->first();
        $pendidikan = Pendidikan::where("biodata_id", $biodata->id)->get();
        $riwayat_pekerjaan = RiwayatPekerjaan::where("biodata_id", $biodata->id)->get();
        $riwayat_pelatihan = RiwayatPelatihan::where("biodata_id", $biodata->id)->get();
        return view("contents.biodata.index", compact('biodata', 'pendidikan', 'riwayat_pekerjaan', 'riwayat_pelatihan'));
    }

    public function biodata_update(Request $request)
    {
        DB::beginTransaction();
        $id = Auth::user()->id;
        $biodata = Biodata::where("user_id", $id)->first();
        $biodata->posisi = (!empty($request->posisi)) ? $request->posisi : $biodata->posisi;
        $biodata->nama = (!empty($request->nama)) ? $request->nama : $biodata->nama;
        $biodata->no_ktp = (!empty($request->no_ktp)) ? $request->no_ktp : $biodata->no_ktp;
        $biodata->tempat_lahir = (!empty($request->tempat_lahir)) ? $request->tempat_lahir : $biodata->tempat_lahir;;
        $biodata->tanggal_lahir = (!empty($request->tanggal_lahir)) ? $request->tanggal_lahir : $biodata->tanggal_lahir;
        $biodata->jenis_kelamin = (!empty($request->jenis_kelamin)) ? $request->jenis_kelamin : $biodata->jenis_kelamin;
        $biodata->agama = (!empty($request->agama)) ? $request->agama : $biodata->agama;
        $biodata->golongan_darah = (!empty($request->golongan_darah)) ? $request->golongan_darah : $biodata->golongan_darah;
        $biodata->status = (!empty($request->status)) ? $request->status : $biodata->status;
        $biodata->alamat_ktp = (!empty($request->alamat_ktp)) ? $request->alamat_ktp : $biodata->alamat_ktp;
        $biodata->alamat_tinggal = (!empty($request->alamat_tinggal)) ? $request->alamat_tinggal : $biodata->alamat_tinggal;
        $biodata->email = (!empty($request->email)) ? $request->email : $biodata->email;
        $biodata->no_telepon = (!empty($request->no_telepon)) ? $request->no_telepon : $biodata->no_telepon;
        $biodata->orang_terdekat = (!empty($request->orang_terdekat)) ? $request->orang_terdekat : $biodata->orang_terdekat;
        $biodata->skill = (!empty($request->skill)) ? $request->skill : $biodata->skill;
        $biodata->ditempatkan = (!empty($request->ditempatkan)) ? $request->ditempatkan : $biodata->ditempatkan;
        $biodata->penghasilan = (!empty($request->penghasilan)) ? $request->penghasilan : $biodata->penghasilan;
        $biodata->save();

        Pendidikan::where("biodata_id", $biodata->id)->delete();
        $jumlah_pendidikan_terakhir = count($request->pendidikan_terakhir);
        for ($i = 0; $i < $jumlah_pendidikan_terakhir; $i++) :
            Pendidikan::create([
                "biodata_id" => $biodata->id,
                "pendidikan_terakhir" => $request->pendidikan_terakhir[$i],
                "institusi" => $request->institusi[$i],
                "jurusan" => $request->jurusan[$i],
                "tahun_lulus" => $request->tahun_lulus[$i],
                "ipk" => $request->ipk[$i]
            ]);
        endfor;

        RiwayatPelatihan::where("biodata_id", $biodata->id)->delete();
        $jumlah_nama_seminar = count($request->nama_seminar);
        for ($i = 0; $i < $jumlah_nama_seminar; $i++) :
            RiwayatPelatihan::create([
                "biodata_id" => $biodata->id,
                "nama_seminar" => $request->nama_seminar[$i],
                "sertifikat" => $request->sertifikat[$i],
                "tahun" => $request->tahun[$i]
            ]);
        endfor;

        RiwayatPekerjaan::where("biodata_id", $biodata->id)->delete();
        $jumlah_nama_perusahaan = count($request->nama_perusahaan);
        for ($i = 0; $i < $jumlah_nama_perusahaan; $i++) :
            RiwayatPekerjaan::create([
                "biodata_id" => $biodata->id,
                "nama_perusahaan" => $request->nama_perusahaan[$i],
                "posisi_terakhir" => $request->posisi_terakhir[$i],
                "pendapatan_terakhir" => $request->pendapatan_terakhir[$i],
                "tahun" => $request->tahun[$i]
            ]);
        endfor;

        DB::commit();

        return redirect("/biodata")->with("success", "Berhasil memperbarui data");
    }

    public function pelamar()
    {
        $user = User::where('role', 'isUser')->get();
        return view("contents.pelamar.index", compact('user'));
    }

    public function pelamar_detail($id)
    {
        $biodata = Biodata::where("user_id", $id)->first();
        if (!$biodata) return redirect('/pelamar');

        $pendidikan = Pendidikan::where("biodata_id", $biodata->id)->get();
        $riwayat_pekerjaan = RiwayatPekerjaan::where("biodata_id", $biodata->id)->get();
        $riwayat_pelatihan = RiwayatPelatihan::where("biodata_id", $biodata->id)->get();
        return view("contents.pelamar.detail", compact('biodata', 'pendidikan', 'riwayat_pekerjaan', 'riwayat_pelatihan'));
    }
}
