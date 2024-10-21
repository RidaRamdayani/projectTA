<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;
    protected $table = 'petanis';
    protected $primarykey = 'id';
    protected $fillable = [
        'periode_id', 'kecamatan_id', 'desa_id', 'komoditi_id', 'petani'];

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
}
