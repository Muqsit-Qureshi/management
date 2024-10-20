<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Student')->insert([
            ['student_name' => 'Sam'],
            ['student_name' => 'Liba'],
            ['student_name' => 'Zoe'],
            ['student_name' => 'andrwe '],
        ]);
    }
}
