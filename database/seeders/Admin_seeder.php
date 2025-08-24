<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class Admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
       $user= User::create([
            'name' =>'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
       $roles=Role::all();
        $user->assignRole($roles);

    }
}
