<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizenCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizen_communication', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('citizen_id')->unsigned();
            $table->integer('type_communication_id')->unsigned();
            $table->string('account_id');
            $table->timestamps();
        });

        Schema::table('citizen_communication', function (Blueprint $table){
            $table->foreign('citizen_id')
                ->references('id')
                ->on('citizens')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_communication_id')
                ->references('id')
                ->on('types_communication')
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
        Schema::dropIfExists('citizen_communication');
    }
}
