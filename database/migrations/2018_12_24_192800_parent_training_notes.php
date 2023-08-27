<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParentTrainingNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_training_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thread_id');
            $table->integer('thread_row');
            $table->string('column_name');
            $table->text('column_value');
            $table->dateTime('training_date');
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
         Schema::dropIfExists('parent_training_notes');
    }
}
