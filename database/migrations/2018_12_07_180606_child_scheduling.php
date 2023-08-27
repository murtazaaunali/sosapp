<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChildScheduling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_scheduling', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faranchise_id');
            $table->string('class_name');
            $table->integer('child_id');
            $table->string('schedule');
            $table->string('day');
            $table->integer('time_in');
            $table->integer('time_out');
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
       Schema::drop('child_scheduling');
    }
}
