<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmergencyAccessHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_access_histories', function (Blueprint $table) {
            $table->bigInteger('requester_id');
            $table->json('external_tables');
            $table->timestamp('access_date')->useCurrent();
            $table->foreign('requester_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_access_histories');
    }
}
