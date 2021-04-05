<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = 
        [
            [
                'username' => 'fadillah',
                'password' => Hash::make('12345'),
                'nama_petugas' => 'Fadillah',
                'level' => 'ADMIN',
            ],
            [
                'username' => 'aulia',
                'password' => Hash::make('12345'),
                'nama_petugas' => 'Aulia',
                'level' => 'PETUGAS',
            ],
        ];
        
        foreach ($data as $key => $value)
        {
            DB::table('users')->insert($value);
        }
    }
}
