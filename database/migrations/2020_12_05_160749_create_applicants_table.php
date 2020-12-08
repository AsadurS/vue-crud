<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->index();
            $table->string("name");
            $table->string("email")->unique();
            $table->bigInteger("division");
            $table->bigInteger("district");
            $table->bigInteger("upozila");
            $table->text("address_details");
            $table->string("language");
            $table->string("file")->nullable();
            $table->string("image")->nullable();
            $table->string("training");
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
        Schema::dropIfExists('applicants');
    }
}
