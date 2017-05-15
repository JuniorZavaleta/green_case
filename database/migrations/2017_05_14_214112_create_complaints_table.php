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
            $table->integer('authority_id')->unsigned();
            $table->integer('type_contamination_id')->unsigned();
            $table->integer('type_communication_id')->unsigned();
            $table->integer('complaint_state_id')->unsigned();
            $table->float('latitude');
            $table->float('longitude');
            $table->string('commentary');
            $table->date('date_status_updated');
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
