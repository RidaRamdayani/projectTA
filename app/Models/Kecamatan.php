<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatans';
    protected $primarykey = 'id';
    protected $fillable = ['id','kecamatan'];

    public function desas()
    {
        return $this->hasMany(Desa::class);
    }

    public function luas_tanamans()
    {
        return $this->hasMany(LuasTanaman::class);
    }

    public function produksis()
    {
        return $this->hasMany(Produksi::class);
    }

    public function petanis()
    {
        return $this->hasMany(Petani::class);
    }

}

