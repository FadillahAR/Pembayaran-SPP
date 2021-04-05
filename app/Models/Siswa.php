<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $primaryKey = 'nisn';
    
    protected $fillable = ['nisn','nis','nama','id_kelas','alamat','no_telp','id_spp','username','password'];

    public function spp() 
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}