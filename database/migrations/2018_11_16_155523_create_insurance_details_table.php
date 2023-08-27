<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Company');
            $table->string('CoverageFrom');
            $table->string('CoverageTo');
            $table->string('SubscriberName');
            $table->string('SubscriberAddress');
            $table->string('GroupPolicyNumber');
            $table->string('InsuredID');
            $table->string('PatientName');
            $table->string('RelationToSubscriber');
            $table->string('Gender');
            $table->string('DOB');
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
        Schema::dropIfExists('insurance_details');
    }
}
