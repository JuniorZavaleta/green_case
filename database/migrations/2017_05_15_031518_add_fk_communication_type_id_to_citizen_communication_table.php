<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCommunicationTypeIdToCitizenCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizen_communication', function (Blueprint $table) {
            $table->foreign('communication_type_id')
                ->references('id')
                ->on('communication_types')
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
            $table->dropForeign('citizen_communication_communication_type_id_foreign');
        });
    }
}
