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
//        $table->id();
//        $table->string("code")->unique();
//        $table->string('name');
//        $table->string('email')->unique();
//        $table->date("birthday")->nullable();
//        $table->string("phone")->nullable();
//        $table->string("address")->nullable();
//        $table->string("parent")->nullable();
//        $table->string("parent_phone")->nullable();
//        $table->longText("avatar")->nullable();
//        $table->timestamp('email_verified_at')->nullable();
//        $table->string("role");
//        $table->string('password');
        for ($i = 1; $i < 40; $i++) {
            $student = [
                'code' => 'HS' . $i,
                'name' => fake("vi_VN")->name,
                'email' => fake("vi_VN")->email,
                'birthday' => Carbon::now(),
                'phone' => fake()->phoneNumber,
                'address' => fake("vi_VN")->address,
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png',
                'role' => 'student',
                'password' => Hash::make("12345")
            ];
            Student::create($student);
        }
    }
}