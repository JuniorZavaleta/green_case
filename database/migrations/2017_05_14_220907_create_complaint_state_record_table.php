<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintStateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_state_record', function (Blueprint $table) {
            $table->increments('id');
            $table->date('status_date');
            $table->integer('complaint_id')->unsigned();
            $table->integer('complaint_state_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('complaint_state_record', function (Blueprint $table){
            $table->foreign('complaint_id')
                ->references('id')
                ->on('complaints')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('complaint_state_id')
                ->references('id')
                ->on('complaint_states')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaint_state_record');
    }
}
