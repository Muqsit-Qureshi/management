<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('class_teachers')->insert([
            ['name' => 'jhon'],
            ['name' => 'Smith'],
            ['name' => 'Richard Roe'],
            ['name' => 'Emily '],
        ]);
    }
}
