<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeThreads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_threads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faranchise_id');
            $table->integer('employee_id');
            $table->string('name');
            $table->integer('parent_id');
            $table->string('created_by');
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
        Schema::dropIfExists('employee_threads');
    }
}
