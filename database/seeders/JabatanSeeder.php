<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Direktur','HRD','Manager', 'Programmer', 'UI/UX Designer', 'Senior Programmer', 'System Analyst', 'Server Engineer', 'Finance'
        ];

        foreach($data as $item){
            Jabatan::create([
                'nama' => $item
            ]);
        }
    }
}
