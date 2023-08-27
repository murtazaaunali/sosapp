<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFranchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchises', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->integer('Status');
            $table->integer('Location');
            $table->integer('Address');
            $table->integer('DateOpened');
            $table->integer('DateFDDSigned');
            $table->integer('DateFDDExpires');
            $table->rememberToken();
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
        Schema::drop('franchises');
    }
}
