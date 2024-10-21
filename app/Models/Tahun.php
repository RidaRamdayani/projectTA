<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;
    protected $table = 'tahuns';
    protected $primarykey = 'id';
    protected $fillable = ['periode'];

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
