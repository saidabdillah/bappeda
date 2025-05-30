<?php

namespace Database\Seeders;

use App\Models\kegiatan;
use App\Models\Matrik;
use App\Models\Program;
use App\Models\Skpd;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);


        $this->call([
            // SkpdSeeder::class,
            // ProgramSeeder::class,
            // MatrikSeeder::class,
            RolePermissionSeeder::class
        ]);
        $admin->assignRole('admin');


        // $user = User::create([
        //     'skpd_id' => $tujuan_1->id,
        //     'name' => 'user',
        //     'email' => 'user@example.com',
        //     'password' => bcrypt('password'),
        // ]);
    }
}
