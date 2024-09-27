<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        if(!Course::where('name', 'Curso de Laravel - T1')->first()){
            Course::create([
                //'name' => Str::random(10) 
                'name' => 'Curso de Laravel - T1',
                'price' => '197.43'
            ]);
    
        }
        if(!Course::where('name', 'Curso de Laravel - T2')->first()){
            Course::create([
                //'name' => Str::random(10) 
                'name' => 'Curso de Laravel - T2',
                'price' => '247.43'
            ]);
        }
    }
}
