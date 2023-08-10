<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'reviewer-rab',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'reviewer-tor',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'pengusul',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'pimpinan',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'keuangan',
            'guard_name' => 'web'
        ]);


    
    }
}
