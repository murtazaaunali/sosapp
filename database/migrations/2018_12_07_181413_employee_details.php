<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faranchise_id');
            $table->integer('employee_id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->date('dob');
            $table->string('job_title');
            $table->string('crew');
            $table->date('dateemploymentStarted');
            $table->date('dateprobation');
            $table->string('initalpayrate');
            $table->string('currentpayrate');
            $table->string('insuranceplan');
            $table->string('retirementplan');
            $table->string('allowedpaidvacations');
            $table->string('remainingpaidbalance');
            $table->string('sickdaysallowed');
            $table->string('balancesickdays');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee_details');
    }
}
