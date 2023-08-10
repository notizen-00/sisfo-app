<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => password_hash('12345678',PASSWORD_DEFAULT),
        ]);

        $admin->assignRole('admin');

        $pengusul = User::create([
            'name' => 'Pengusul',
            'email' => 'pengusul@gmail.com',
            'password' => password_hash('12345678',PASSWORD_DEFAULT),
        ]);

        $pengusul->assignRole('pengusul');

        $pimpinan = User::create([
            'name' => 'Pimpinan',
            'email' => 'pimpinan@gmail.com',
            'password' => password_hash('12345678',PASSWORD_DEFAULT),
        ]);

        $pimpinan->assignRole('pimpinan');

        $tor = User::create([
            'name' => 'Reviewer Tor',
            'email' => 'dummytor@gmail.com',
            'password' => password_hash('12345678',PASSWORD_DEFAULT),
        ]);

        $tor->assignRole('reviewer-tor');

        $rab = User::create([
            'name' => 'Reviewer Rab',
            'email' => 'dummyrab@gmail.com',
            'password' => password_hash('12345678',PASSWORD_DEFAULT),
        ]);

        $rab->assignRole('reviewer-rab');

        $keuangan = User::create([
            'name' => 'Keuangan',
            'email' => 'keuangan@gmail.com',
            'password' => password_hash('12345678',PASSWORD_DEFAULT),
        ]);

        $keuangan->assignRole('keuangan');

    
    }
}
