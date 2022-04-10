<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Biodata extends Model
{
    use HasFactory;
    public $primaryKey = 'id';
    public $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        "user_id",
        "nama",
        "posisi",
        "no_ktp",
        "tempat_lahir",
        "tanggal_lahir",
        "jenis_kelamin",
        "agama",
        "golongan_darah",
        "status",
        "alamat_ktp",
        "alamat_tinggal",
        "email",
        "no_telepon",
        "orang_terdekat",
        "skill",
        "ditempatkan",
        "penghasilan",
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) :
                $model->{$model->getKeyName()} = Str::uuid();
            endif;
        });
    }

    public function pendidikan()
    {
        return $this->hasOne(Pendidikan::class);
    }
}
