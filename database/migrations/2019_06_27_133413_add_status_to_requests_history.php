<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToRequestsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('access_requests_history', function (Blueprint $table) {
            $table->boolean('requested')->nullable(true);
            $table->boolean('result')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('access_requests_history', function (Blueprint $table) {
            $table->removeColumn('requested');
            $table->removeColumn('result');
        });
    }
}
