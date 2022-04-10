<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RiwayatPekerjaan extends Model
{
    use HasFactory;
    public $primaryKey = 'id';
    public $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ["biodata_id", "nama_perusahaan", "posisi_terakhir", "pendapatan_terakhir", "tahun"];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) :
                $model->{$model->getKeyName()} = Str::uuid();
            endif;
        });
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
