<?php

use Illuminate\Database\Seeder;
use App\Models\University;
class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $boards = ["Barisal University","Chittagong University", "Comilla University", "Dhaka University", "Jessore University", "Mymensingh University", "Rajshahi University", "Sylhet University", "Dinajpur University", "other"];

        foreach ($boards as $key => $value) {
        	University::create([
             "name"=> $value
        	]);
        }
    }
}
