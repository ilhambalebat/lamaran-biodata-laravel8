@extends('app')
@section("head")
    @include('layouts.head')
@endsection
@section("script")
    @include('layouts.script')
@endsection
@section('content')
<style>
    .fa-book:hover {
        color: blue;
    }
</style>
<div class="card ml-3 mt-3 mr-3 mb-0">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <center>
                            <h3 class="card-title" align="center">Detail Pelamar</h3>
                        </center>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/biodata/update" method="post">   
                        @csrf                
                    <div class="form-group">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>Posisi Yang Dilamar</label> 
                            </div>    
                            <div class="col-md-6">
                                <label>Nama</label>
                            </div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="posisi" id="posisi" class="form-control" value="{{ $biodata->posisi ?? "" }}" readonly>
                            </div>    
                            <div class="col-md-6">
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $biodata->nama ?? "" }}" readonly>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>No KTP</label> 
                            </div>    
                            <div class="col-md-6">
                                <label>Tempat Lahir</label>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="no_ktp" id="no_ktp" value="{{ $biodata->no_ktp ?? "" }}" class="form-control" readonly>
                            </div>    
                            <div class="col-md-6">
                                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $biodata->tempat_lahir ?? "" }}" class="form-control" readonly>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>Tanggal Lahir</label> 
                            </div>    
                            <div class="col-md-6">
                                <label>Jenis Kelamin</label>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $biodata->tanggal_lahir ?? "" }}" class="form-control" readonly>
                            </div>    
                            <div class="col-md-6">
                                <select name="jenis_kelamin" class="form-control" readonly>
                                    <option {{ ($biodata->jenis_kelamin == "pria") ? "selected" : "" }}>pria</option>
                                    <option {{ ($biodata->jenis_kelamin == "wanita") ? "selected" : ""}}>wanita</option>
                                </select>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>Agama</label> 
                            </div>    
                            <div class="col-md-6">
                                <label>Golongan Darah</label>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="agama" value="{{ $biodata->agama ?? "" }}" id="agama" class="form-control" readonly>
                            </div>    
                            <div class="col-md-6">
                                <input type="text" name="golongan_darah" value="{{ $biodata->golongan_darah ?? "" }}" id="golongan_darah" class="form-control" readonly>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>Status</label> 
                            </div>    
                            <div class="col-md-6">
                                <label>Alamat KTP</label>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="status" value="{{ $biodata->status ?? "" }}" id="status" class="form-control" readonly>
                            </div>    
                            <div class="col-md-6">
                                <textarea type="text" name="alamat_ktp" value="{{ $biodata->alamat_ktp ?? "" }}" id="alamat_ktp" class="form-control" readonly>{{ $biodata->alamat_ktp ?? "" }}</textarea>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>Alamat Tinggal</label> 
                            </div>    
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="alamat_tinggal" value="{{ $biodata->alamat_tinggal ?? "" }}" id="alamat_tinggal" class="form-control" readonly>
                            </div>    
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" value="{{ $biodata->email ?? "" }}" class="form-control" readonly>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label>No Telpon</label> 
                            </div>    
                            <div class="col-md-6">
                                <label>Orang Terdekat yang dapat dihubungi</label>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" name="no_telepon" value="{{ $biodata->no_telepon ?? "" }}" id="no_telepon" class="form-control" readonly>
                            </div>    
                            <div class="col-md-6">
                                <input type="text" name="orang_terdekat" value="{{ $biodata->orang_terdekat ?? "" }}" id="orang_terdekat" class="form-control" readonly>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <center>
                                    <label>Pendidikan Terakhir</label>
                                </center>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Pendidikan Terakhir</label>
                            </div>    
                            <div class="col-md-2">
                                <label>Institusi</label>
                            </div>    
                            <div class="col-md-2">
                                <label>Jurusan</label>
                            </div>    
                            <div class="col-md-2">
                                <label>Tahun Lulus</label>
                            </div>    
                            <div class="col-md-2">
                                <label>IPK</label>
                            </div>    
                            <div class="col-md-2">
                            </div>    
                        </div>
                        <div id="bungkus">                        
                            @if(count($pendidikan) < 1))
                                <div class="row mb-2 input-pendidikan">
                                    <div class="col-md-2">
                                        <input type="text" name="pendidikan_terakhir[]" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="institusi[]" id="institusi" placeholder="Nama Institusi Akademik" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="jurusan[]" id="jurusan" placeholder="Jurusan" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="tahun_lulus[]" id="tahun_lulus" placeholder="Tahun Lulus" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="ipk[]" id="ipk" placeholder="IPK" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        {{-- <a href="javascript:void(0);" class="btn btn-md btn-danger remove_button">-</a> --}}
                                    </div>    
                                </div>
                            @else
                                <?php $no = 1; ?>
                                @foreach($pendidikan as $p)
                                    @if($no == 1)
                                    <div class="row mb-2 input-pendidikan">
                                        <div class="col-md-2">
                                            <input type="text" name="pendidikan_terakhir[]" id="pendidikan_terakhir" value="{{ $p->pendidikan_terakhir }}" placeholder="Pendidikan Terakhir" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="institusi[]" id="institusi" value="{{ $p->institusi }}" placeholder="Nama Institusi Akademik" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="jurusan[]" id="jurusan" value="{{ $p->jurusan }}" placeholder="Jurusan" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="tahun_lulus[]" id="tahun_lulus" value="{{ $p->tahun_lulus }}" placeholder="Tahun Lulus" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="ipk[]" id="ipk" placeholder="IPK" value="{{ $p->ipk }}" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            {{-- <a href="javascript:void(0);" class="btn btn-md btn-danger remove_button">-</a> --}}
                                        </div> 
                                    </div>
                                    @else
                                    <div class="row mb-2 input-pendidikan">
                                        <div class="col-md-2">
                                            <input type="text" name="pendidikan_terakhir[]" value="{{ $p->pendidikan_terakhir }}" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="institusi[]" id="institusi" value="{{ $p->institusi }}" placeholder="Nama Institusi Akademik" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="jurusan[]" id="jurusan" value="{{ $p->jurusan }}" placeholder="Jurusan" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="tahun_lulus[]" id="tahun_lulus" value="{{ $p->tahun_lulus }}" placeholder="Tahun Lulus" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <input type="text" name="ipk[]" id="ipk" value="{{ $p->ipk }}" placeholder="IPK" class="form-control" readonly>
                                        </div>    
                                        <div class="col-md-2">
                                            <a href="javascript:void(0);" class="btn btn-md btn-danger remove_button">-</a>
                                        </div> 
                                    </div>
                                    @endif
                                @endforeach
                            @endif                            
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <center>
                                    <label>Riwayat Pelatihan</label>
                                </center>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label>Nama Seminar</label>
                            </div>    
                            <div class="col-md-3">
                                <label>Sertifikat</label>
                            </div>    
                            <div class="col-md-3">
                                <label>Tahun</label>
                            </div>      
                            <div class="col-md-3">
                            </div>    
                        </div>
                        <div id="bungkus_riwayat_pelatihan">   
                            @if(count($riwayat_pelatihan) < 1))
                            <div class="row mb-2 input-riwayat-pelatihan">
                                <div class="col-md-3">
                                    <input type="text" name="nama_seminar[]" id="nama_seminar" placeholder="Nama Seminar" class="form-control" readonly>
                                </div>    
                                <div class="col-md-3">
                                    <select name="sertifikat[]" id="sertifikat" class="form-control" readonly>
                                        <option>ya</option>
                                        <option>tidak</option>
                                    </select>
                                </div>    
                                <div class="col-md-3">
                                    <input type="text" name="tahun[]" id="tahun" placeholder="tahun" class="form-control" readonly>
                                </div>    
                                <div class="col-md-3">
                                     
                                </div>    
                            </div>
                            @else
                            <?php $no = 1; ?>
                            @foreach($riwayat_pelatihan as $p)
                                @if($no == 1)
                                <div class="row mb-2 input-riwayat-pelatihan">
                                    <div class="col-md-3">
                                        <input type="text" name="nama_seminar[]" value="{{ $p->nama_seminar }}" id="nama_seminar" placeholder="Nama Seminar" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-3">
                                        <select name="sertifikat[]" id="sertifikat" class="form-control" readonly>
                                            <option {{ $p->nama_seminar == "ya" ? "selected" : "" }}>ya</option>
                                            <option {{ $p->nama_seminar == "tidak" ? "selected" : "" }}>tidak</option>
                                        </select>
                                    </div>    
                                    <div class="col-md-3">
                                        <input type="text" name="tahun[]" value="{{ $p->tahun }}" id="tahun" placeholder="tahun" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-3">
                                         
                                    </div>    
                                </div>
                                @else
                                <div class="row mb-2 input-riwayat-pelatihan">
                                    <div class="col-md-3">
                                        <input type="text" name="nama_seminar[]" value="{{ $p->nama_seminar }}" id="nama_seminar" placeholder="Nama Seminar" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-3">
                                        <select name="sertifikat[]" id="sertifikat" class="form-control">
                                            <option {{ $p->nama_seminar == "ya" ? "selected" : "" }}>ya</option>
                                            <option {{ $p->nama_seminar == "tidak" ? "selected" : "" }}>tidak</option>
                                        </select>
                                    </div>    
                                    <div class="col-md-3">
                                        <input type="text" name="tahun[]" value="{{ $p->tahun }}" id="tahun" placeholder="tahun" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-3">
                                        <a href="javascript:void(0);" class="btn btn-md btn-danger remove_button_riwayat_pelatihan">-</a>
                                    </div>    
                                </div>
                                @endif
                            @endforeach
                        @endif    
                        </div>                      
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <center>
                                    <label>Riwayat Pekerjaan</label>
                                </center>
                            </div>    
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <label>Nama Perusahaan</label>
                            </div>    
                            <div class="col-md-2">
                                <label>Posisi Terakhir</label>
                            </div>    
                            <div class="col-md-2">
                                <label>Pendapatan Terakhir</label>
                            </div>    
                            <div class="col-md-2">
                                <label>Tahun</label>
                            </div>    
                            <div class="col-md-2">
                            </div>    
                        </div>
                        <div id="bungkus_riwayat_pekerjaan"> 
                            @if(count($riwayat_pekerjaan) < 1))
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <input type="text" name="nama_perusahaan[]" id="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="posisi_terakhir[]" id="posisi_terakhir" placeholder="Posisi Terakhir" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="pendapatan_terakhir[]" id="pendapatan_terakhir" placeholder="Pendapatan Terakhir" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="tahun[]" id="tahun" placeholder="tahun" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        
                                    </div>    
                                </div>
                            @else
                            <?php $no = 1; ?>
                            @foreach($riwayat_pekerjaan as $p)
                                @if($no == 1)
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <input type="text" name="nama_perusahaan[]" value="{{ $p->nama_perusahaan }}" id="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="posisi_terakhir[]" value="{{ $p->posisi_terakhir }}" id="posisi_terakhir" placeholder="Posisi Terakhir" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="pendapatan_terakhir[]" value="{{ $p->pendapatan_terakhir }}" id="pendapatan_terakhir" placeholder="Pendapatan Terakhir" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="tahun[]" id="tahun" value="{{ $p->tahun }}" placeholder="tahun" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        
                                    </div>    
                                </div>
                                @else
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <input type="text" name="nama_perusahaan[]" value="{{ $p->nama_perusahaan }}" id="nama_perusahaan" placeholder="Nama Perusahaan" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="posisi_terakhir[]" value="{{ $p->posisi_terakhir }}" id="posisi_terakhir" placeholder="Posisi Terakhir" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="pendapatan_terakhir[]" value="{{ $p->pendapatan_terakhir }}" id="pendapatan_terakhir" placeholder="Pendapatan Terakhir" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" name="tahun[]" id="tahun" value="{{ $p->tahun }}" placeholder="tahun" class="form-control" readonly>
                                    </div>    
                                    <div class="col-md-2">
                                        <a href="javascript:void(0);" class="btn btn-md btn-danger remove_button_riwayat_pekerjaan">-</a>
                                    </div>    
                                </div>
                                @endif
                            @endforeach
                        @endif                     
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Skill</label>
                            </div>    
                            <div class="col-md-4">
                                <label>Bersedia ditempatkan Seluruh kantor</label>
                            </div>    
                            <div class="col-md-4">
                                <label>Penghasilan yang diharapkan</label>
                            </div>    
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <input type="text" name="skill" id="skill" value="{{ $biodata->skill ?? "" }}" class="form-control" placeholder="Skill"  readonly>
                            </div>    
                            <div class="col-md-4">
                                <select name="ditempatkan" id="" class="form-control"  readonly>
                                    <option {{ $biodata->status == "ya" ? "selected" : "" }}>ya</option>
                                    <option {{ $biodata->status == "tidak" ? "selected" : "" }}>tidak</option>
                                </select>
                            </div>    
                            <div class="col-md-4">
                                <input type="text" name="penghasilan" value="{{ $biodata->penghasilan ?? "" }}" id="penghasilan" placeholder="Penghasilan yang diharapkan / bulan" class="form-control"  readonly>
                            </div>    
                        </div>
                        <div class="row float-right">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script_tambahan')
@endsection