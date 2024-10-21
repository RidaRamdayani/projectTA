<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'desas';
    protected $primarykey = 'id';
    protected $fillable = [
        'id','kecamatan_id','desa'];
    
    public function kecamatans()
    {
        return $this->belongsTo(Kecamatan::class,'kecamatan_id','id');
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
    