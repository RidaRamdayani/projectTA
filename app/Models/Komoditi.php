<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komoditi extends Model
{
    use HasFactory;
    protected $table = 'komoditis';
    protected $primarykey = 'id';
    protected $fillable = ['id','komoditi'];

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
