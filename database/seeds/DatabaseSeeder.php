<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UserSeeder::class,
             CommunicateSeeder::class,
         	BoardtableSeeder::class,
         	ExamTableSeeder::class,
         	UniversityTableSeeder::class

         ]);
    }
}
