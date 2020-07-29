<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faculty')->insert([
            'name' => 'teacher',
            'email' => 'teacher@somaiya.edu',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'student',
            'email' => 'student@somaiya.edu',
            'password' => Hash::make('12345678'),
        ]);
    }
}
