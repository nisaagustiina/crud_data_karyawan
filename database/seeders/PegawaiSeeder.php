<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Jaya Setiabudi',
                'nip' => '0000001',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1997-06-07',
                'no_telp' => '08981234678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Sudah Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Teknik Infromatika',
                'ipk' => '3.7'
            ],
            [
                'nama_lengkap' => 'Citra Lestari',
                'nip' => '0000002',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2000-06-02',
                'no_telp' => '08990874678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Ssitem Informasi',
                'ipk' => '3.5'
            ],
            [
                'nama_lengkap' => 'Anindia Putri',
                'nip' => '0000003',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Sumedang',
                'tanggal_lahir' => '1995-01-17',
                'no_telp' => '08981234678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Sudah Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Teknik Infromatika',
                'ipk' => '3.7'
            ],
            [
                'nama_lengkap' => 'Reyhan',
                'nip' => '0000004',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2001-12-09',
                'no_telp' => '08981234678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Teknik Infromatika',
                'ipk' => ''
            ],
            [
                'nama_lengkap' => 'Rani Fitri',
                'nip' => '0000005',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2001-05-04',
                'no_telp' => '08956434678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'SMK',
                'jurusan' => 'Rekayasa Perangkat Lunak',
                'ipk' => ''
            ],
            [
                'nama_lengkap' => 'Budiman',
                'nip' => '0000006',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1998-06-07',
                'no_telp' => '08956434678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Teknik Komputer',
                'ipk' => '2.35'
            ],
            [
                'nama_lengkap' => 'Risky Heriawan',
                'nip' => '0000007',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1999-03-05',
                'no_telp' => '08956434678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'SMK',
                'jurusan' => 'Teknik Komputer Jaringan',
                'ipk' => ''
            ],
            [
                'nama_lengkap' => 'Luna',
                'nip' => '0000008',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1999-01-01',
                'no_telp' => '08956434678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Sudah Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Akuntansi',
                'ipk' => ''
            ],
            [
                'nama_lengkap' => 'Aska',
                'nip' => '0000009',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2000-01-01',
                'no_telp' => '08956434678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Manajemen Informatika',
                'ipk' => ''
            ],
            [
                'nama_lengkap' => 'Cika',
                'nip' => '0000010',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1999-07-09',
                'no_telp' => '08956434678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Belum Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Sistem Informasi',
                'ipk' => '3.4'
            ],
            [
                'nama_lengkap' => 'Arturo',
                'nip' => '0000011',
                'jenis_kelamin' => 'Laki-Laki',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1996-01-01',
                'no_telp' => '08956434678',
                'alamat' => 'Jakarta',
                'agama' => 'Islam',
                'status_pernikahan' => 'Sudah Menikah',
                'no_ktp' => '',
                'no_npwp' => '',
                'no_kk' => '',
                'pend_terakhir' => 'S1',
                'jurusan' => 'Teknik Informatika',
                'ipk' => '3.7'
            ]
        ];

        foreach($data as $item){
            Pegawai::create([
                'nama_lengkap' => $item['nama_lengkap'],
                'nip' => $item['nip'],
                'jenis_kelamin' => $item['jenis_kelamin'],
                'tempat_lahir' => $item['tempat_lahir'],
                'tanggal_lahir' => $item['tanggal_lahir'],
                'no_telp' => $item['no_telp'],
                'alamat' => $item['alamat'],
                'agama' => $item['agama'],
                'status_pernikahan' => $item['status_pernikahan'],
                'no_ktp' => $item['no_ktp'],
                'no_npwp' => $item['no_npwp'],
                'no_kk' => $item['no_kk'],
                'pend_terakhir' => $item['pend_terakhir'],
                'jurusan' => $item['jurusan'],
                'ipk' => $item['ipk']
            ]);
        }
    }
}
