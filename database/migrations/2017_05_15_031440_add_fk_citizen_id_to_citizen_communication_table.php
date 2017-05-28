<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCitizenIdToCitizenCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizen_communication', function (Blueprint $table) {
            $table->foreign('citizen_id')
                ->references('id')
                ->on('citizens')
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
        Schema::table('citizen_communication', function (Blueprint $table) {
            $table->dropForeign('citizen_communication_citizen_id_foreign');
        });
    }
}
