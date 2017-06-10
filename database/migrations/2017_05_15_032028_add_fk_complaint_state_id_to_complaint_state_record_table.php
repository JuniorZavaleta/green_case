<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkComplaintStateIdToComplaintStateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint_state_record', function (Blueprint $table) {
            $table->foreign('complaint_status_id')
                ->references('id')
                ->on('complaint_status')
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
        Schema::table('complaint_state_record', function (Blueprint $table) {
            $table->dropForeign('complaint_state_record_complaint_status_id_foreign');
        });
    }
}
