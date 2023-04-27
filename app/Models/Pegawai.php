<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = ['nama_lengkap','nip','jenis_kelamin','tempat_lahir','tanggal_lahir','no_telp','alamat','agama','status_pernikahan','no_ktp','no_kk','no_npwp','pend_terakhir','jurusan','ipk'];

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class, 'pegawai_id', 'id');
    }
}
