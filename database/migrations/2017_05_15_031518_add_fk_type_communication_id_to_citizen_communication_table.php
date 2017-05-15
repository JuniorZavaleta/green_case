<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkTypeCommunicationIdToCitizenCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizen_communication', function (Blueprint $table) {
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
        Schema::table('citizen_communication', function (Blueprint $table) {
            $table->dropForeign('citizen_communication_type_communication_id_foreign');
        });
    }
}
