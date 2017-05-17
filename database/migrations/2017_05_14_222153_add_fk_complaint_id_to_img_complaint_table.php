<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkComplaintIdToImgComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('img_complaint', function (Blueprint $table) {
            $table->foreign('complaint_id')
                ->references('id')
                ->on('complaints')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('img_complaint', function (Blueprint $table) {
            $table->dropForeign('img_complaint_complaint_id_foreign');
        });
    }
}
