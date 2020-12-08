<?php

use Illuminate\Database\Seeder;
use App\Models\Board;

class BoardtableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $boards = ["Barisal","Chittagong", "Comilla", "Dhaka", "Jessore", "Mymensingh", "Rajshahi", "Sylhet", "Dinajpur", "other"];

        foreach ($boards as $key => $value) {
        	Board::create([
             "name"=> $value
        	]);
        }
    }
}
