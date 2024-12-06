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
            $superAdmin = User::create([
                'name' => 'Luiz',
                'email' => 'luizvelasco@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $superAdmin->assignRole('Super Admin');
        }

        if(!User::where('email', 'henrique@gmail.com')->first()) {
            $admin = User::create([
                'name' => 'Henrique',
                'email' => 'henrique@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $admin->assignRole('Admin');
        }

        
        if(!User::where('email', 'thais@gmail.com')->first()) {
            $teacher = User::create([
                'name' => 'Thaís',
                'email' => 'thais@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $teacher->assignRole('Professor');
        }

        if(!User::where('email', 'maria@gmail.com')->first()) {
            $tutor = User::create([
                'name' => 'Maria',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $tutor->assignRole('Tutor');
        }

        if(!User::where('email', 'marcos@gmail.com')->first()) {
            $student = User::create([
                'name' => 'Marcos',
                'email' => 'marcos@gmail.com',
                'password' => Hash::make('123456a', ['rounds' => 12])
            ]);

            // Atribuir papel para o usuário
            $student->assignRole('Aluno');
        }
        
    }
}
