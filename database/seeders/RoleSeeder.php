<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder {
    public function run() {
        Role::insert([
            ['name' => 'worker'],
            ['name' => 'client'],
            ['name' => 'admin']
        ]);
    }
}
