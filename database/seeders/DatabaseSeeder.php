<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(CreateUserSeeder::class);
        // User::factory(5)->create();
    }
}