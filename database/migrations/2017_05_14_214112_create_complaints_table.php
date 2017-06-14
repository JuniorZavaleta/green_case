<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('citizen_id')->unsigned();
            $table->integer('district_id')->unsigned()->nullable();
            $table->integer('type_contamination_id')->unsigned();
            $table->integer('type_communication_id')->unsigned();
            $table->integer('complaint_status_id')->unsigned();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->text('commentary')->nullable();
            $table->date('date_status_updated')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('complaints');
    }
}
