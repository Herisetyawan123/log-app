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
            'name' => 'kepaladinas',
            'email' => 'kepaladinas@gmail.com',
            'password' => Hash::make('kepaladinas@gmail.com'),
        ]);

        // kepala bidang
        $kepbid = User::create([
            'name' => 'pertanian',
            'email' => 'dinastani@gmail.com',
            'password' => Hash::make('dinastani@gmail.com'),
            'position' => 'kepala bidang',
            'superior_id' => $kedin->id
        ]);

        // pegawai 
        User::create([
            'name' => 'jaka nur',
            'email' => 'dinashutan@gmail.com',
            'password' => Hash::make('dinashutan@gmail.com'),
            'position' => 'pegawai',
            'superior_id' => $kepbid->id
        ]);

        // kepala bidang
        $kepbid2 = User::create([
            'name' => 'Perhutanan',
            'email' => 'stafftani@gmail.com',
            'password' => Hash::make('stafftani@gmail.com'),
            'position' => 'kepala bidang',
            'superior_id' => $kedin->id
        ]);

        // pegawai 
        User::create([
            'name' => 'Petani',
            'email' => 'staffhutan@gmail.com',
            'password' => Hash::make('staffhutan@gmail.com'),
            'position' => 'pegawai',
            'superior_id' => $kepbid2->id
        ]);
    }
}
