<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@blog.com',
            'password' => 'password!',
        ]);

        $user->attachRole('admin');
    }
}