<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $direktur = User::create([
            'name' => 'Direktur Utama',
            'email' => 'direktur@example.com',
            'password' => Hash::make('password'),
            'role' => 'direktur',
            'parent_id' => null,
        ]);

        $managerOps = User::create([
            'name' => 'Manager Operasional',
            'email' => 'manager.ops@example.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'parent_id' => $direktur->id,
        ]);

        $managerKeu = User::create([
            'name' => 'Manager Keuangan',
            'email' => 'manager.keu@example.com',
            'password' => Hash::make('password'),
            'role' => 'manager',
            'parent_id' => $direktur->id,
        ]);

        User::create([
            'name' => 'Staf Operasional',
            'email' => 'staf.ops@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'parent_id' => $managerOps->id,
        ]);

        User::create([
            'name' => 'Staf Keuangan',
            'email' => 'staf.keu@example.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
            'parent_id' => $managerKeu->id,
        ]);
    }
}
