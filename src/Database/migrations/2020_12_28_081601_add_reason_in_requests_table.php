<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReasonInRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request', function (Blueprint $table) {
            if (!Schema::hasColumns('request', ['reason_id', 'reason_text'])) {

                $table->integer('reason_id')->nullable()->unsigned();
                $table->foreign('reason_id')->references('id')->on('request_reasons');
                $table->string('reason_text')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request', function (Blueprint $table) {
            if (Schema::hasColumns('request', ['reason_id', 'reason_text'])) {
                $table->dropForeign('request_reason_id_foreign');
                $table->dropColumn('reason_id');
                $table->dropColumn('reason_text');
            }
        });
    }
}
