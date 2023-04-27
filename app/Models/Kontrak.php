<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;

    protected $table = 'kontrak';
    protected $fillable = ['pegawai_id','jabatan_id','tanggal_surat','tanggal_awal','tanggal_akhir','durasi','dokumen','jenis_kerjasama'];

    public function pegawai()
    {
        return $this->hasOne(Kontrak::class, 'pegawai_id', 'id');
    }

    public function jabatan()
    {
        return $this->hasOne(Jabatan::class , 'pegawai_id','id');
    }
}
