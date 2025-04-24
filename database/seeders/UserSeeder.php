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
            'password' => Hash::make('12345678'),
            'role' => 'direktur',
            'supervisor_id' => null,
        ]);

        $managerOps = User::create([
            'name' => 'Manager Operasional',
            'email' => 'manager.ops@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'manager_operasional',
            'supervisor_id' => $direktur->id,
        ]);

        $managerKeu = User::create([
            'name' => 'Manager Keuangan',
            'email' => 'manager.keu@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'manager_keuangan',
            'supervisor_id' => $direktur->id,
        ]);

        User::create([
            'name' => 'Staf Operasional',
            'email' => 'staf.ops@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'staf',
            'supervisor_id' => $managerOps->id,
        ]);

        User::create([
            'name' => 'Staf Keuangan',
            'email' => 'staf.keu@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'staf',
            'supervisor_id' => $managerKeu->id,
        ]);
    }
}
