<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'Superadmin']);
        Role::create(['name' => 'Pasien']);

        // Superadmin
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'telephone' => '085876550051',
            'gender' => 'Laki-Laki',
            'tgl_lahir' => '2000-01-01',
            'alamat' => 'Jl. Raya No. 1',
            'nik' => '1234567890',
            'email_verified_at' => now(),
            'password' => bcrypt('superadmin'),
            'role' => 'Superadmin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $superadmin->assignRole('Superadmin');

        // Buat user Pasien
        $adminDesa = User::create([
            'name' => 'Pasien',
            'email' => 'pasien@gmail.com',
            'telephone' => '085876550051',
            'gender' => 'Laki-Laki',
            'tgl_lahir' => '2000-01-01',
            'alamat' => 'Jl. Raya No. 1',
            'nik' => '1234567890',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'Pasien',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        $adminDesa->assignRole('Pasien');
    }
}
