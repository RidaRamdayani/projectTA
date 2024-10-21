<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $table = 'notification';

    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'email', 'kecamatan', 'desa', 'pelayanan', 'pesan'];
    public $timestamps = true;
}
