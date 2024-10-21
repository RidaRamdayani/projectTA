<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuasTanaman extends Model
{
    use HasFactory;

    protected $table = 'luas_tanamans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'periode_id', 'kecamatan_id', 'desa_id', 'komoditi_id', 'luas_tanaman_muda', 'luas_tanaman_menghasilkan', 'luas_tanaman_tua', 'jumlah'
    ];

    public function tahuns()
    {
        return $this->belongsTo(Tahun::class, 'periode_id', 'id');
    }

    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }

    public function desas()
    {
        return $this->belongsTo(Desa::class, 'desa_id', 'id');
    }

    public function komoditis()
    {
        return $this->belongsTo(Komoditi::class, 'komoditi_id', 'id');
    }

    // Event listener for saving
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->jumlah = $model->luas_tanaman_muda + $model->luas_tanaman_menghasilkan + $model->luas_tanaman_tua;
        });
    }

}
