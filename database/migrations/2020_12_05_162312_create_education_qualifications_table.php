<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_qualifications', function (Blueprint $table) {
            $table->id();
             $table->foreignId('applicant_id')
                     ->constrained()
                    ->onDelete('cascade');
            $table->bigInteger("exam_id");
            $table->bigInteger("un_id");
            $table->bigInteger("board_id");
            $table->string("result");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_qualifications');
    }
}
