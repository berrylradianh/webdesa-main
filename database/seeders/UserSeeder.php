<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil role
        $adminRole = Role::where('name', 'admin')->first();
        $perangkatRole = Role::where('name', 'perangkatdesa')->first();
        $wargaRole = Role::where('name', 'warga')->first();

        // Admin default
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'email' => 'admin@desainovatif.com',
                'password' => Hash::make('DesaInovatif121!'),
                'role_id' => $adminRole->id,
            ]
        );

        // Perangkat Desa default
        User::firstOrCreate(
            ['username' => 'perangkat'],
            [
                'email' => 'arief20112001@gmail.com',
                'password' => Hash::make('DesaInovatif121!'),
                'role_id' => $perangkatRole->id,
            ]
        );

        // Warga default
        User::firstOrCreate(
            ['username' => 'nauvan'],
            [
                'email' => 'nauvan121@gmail.com',
                'password' => Hash::make('DesaInovatif121!'),
                'role_id' => $wargaRole->id,
            ]
        );
    }
}
