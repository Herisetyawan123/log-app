<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // kepala dinsa
        $kedin = User::create([
            'name' => 'alvien nur',
            'email' => '123@gmail.com',
            'password' => Hash::make('123@gmail.com'),
        ]);

        // kepala bidang
        $kepbid = User::create([
            'name' => 'jaka nur',
            'email' => '222@gmail.com',
            'password' => Hash::make('222@gmail.com'),
            'position' => 'kepala bidang',
            'superior_id' => $kedin->id
        ]);

        // pegawai 
        User::create([
            'name' => 'jaka nur',
            'email' => '333@gmail.com',
            'password' => Hash::make('333@gmail.com'),
            'position' => 'pegawai',
            'superior_id' => $kepbid->id
        ]);

        // kepala bidang
        $kepbid2 = User::create([
            'name' => 'andri nur',
            'email' => '444@gmail.com',
            'password' => Hash::make('444@gmail.com'),
            'position' => 'kepala bidang',
            'superior_id' => $kedin->id
        ]);

        // pegawai 
        User::create([
            'name' => 'alman nur',
            'email' => '555@gmail.com',
            'password' => Hash::make('555@gmail.com'),
            'position' => 'pegawai',
            'superior_id' => $kepbid2->id
        ]);
    }
}
