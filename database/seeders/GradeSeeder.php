<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5000; $i++) {
            DB::table("grades")->insert([
                'name' => fake("vi_VN")->word,
                'program' => fake("vi_VN")->colorName,
                'time' => rand(10, 90),
                'lessons' => rand(5, 45),
                'status' => "learn",
            ]);
        }
    }
}
