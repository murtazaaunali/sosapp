<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Childs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faranchise_id');
            $table->string('childname');
            $table->date('date_of_birth');
            $table->string('crew');
            $table->integer('parent');
            $table->integer('status');
            $table->date('date_of_initial_assessment');
            $table->date('date_that_service_started');
            $table->date('date_of_repeat_assessment');
            $table->string('profilepicture');
            $table->integer('scheduled');
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
        Schema::drop('childs');
    }
}
