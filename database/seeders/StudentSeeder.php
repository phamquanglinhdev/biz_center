<?php

namespace Database\Seeders;

use App\Domain\Students\Entites\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 4000; $i++) {
            $student = [
                'code' => 'HS' . $i,
                'name' => fake("vi_VN")->lastName . " " . fake("vi_VN")->lastName,
                'parent' => fake("vi_VN")->lastName . " " . fake("vi_VN")->lastName,
                'email' => fake("vi_VN")->email,
                'birthday' => Carbon::now(),
                'phone' => fake("vi_VN")->phoneNumber,
                'address' => fake("vi_VN")->address,
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png',
                'role' => 'student',
                'password' => Hash::make("12345")
            ];
            Student::create($student);
        }
    }
}
