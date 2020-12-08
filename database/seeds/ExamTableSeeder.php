<?php

use Illuminate\Database\Seeder;
use App\Models\Exam;
class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $boards = ["SSC","HSC", "B.Sc","M.Sc", "other"];

        foreach ($boards as $key => $value) {
        	Exam::create([
             "name"=> $value
        	]);
        }
    }
}
