<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faranchise_id');
            $table->string('FatherFirstName');
            $table->string('FatherLastName');
            $table->string('FatherEmail');
            $table->string('FatherDOB');
            $table->string('FatherSSN');
            $table->string('FatherContactNo');
            $table->string('FatherCompany');
            $table->string('MotherFirstName');
            $table->string('MotherLastName');
            $table->string('MotherEmail');
            $table->string('MotherDOB');
            $table->string('MotherCompany');
            $table->string('MotherSSN');
            $table->string('MotherContactNo');
            $table->string('Address');
            $table->string('City');
            $table->string('State');
            $table->string('PostalCode');
            $table->integer('client_id');
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
        Schema::dropIfExists('clients_profile');
    }
}
