<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'luizvelasco@gmail.com')->first()) {
            User::create([
                'name' => 'Luiz',
                'email' => 'luizvelasco@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }

        if(!User::where('email', 'joaosilva@gmail.com')->first()) {
            User::create([
                'name' => 'João',
                'email' => 'joaosilva@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);
        }

        
    }
}
