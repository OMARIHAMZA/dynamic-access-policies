<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessRequestsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_requests_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('requester_id');
            $table->json('external_tables');
            $table->timestamp('access_date')->useCurrent();
            $table->boolean('result')->nullable(true);
            $table->boolean('emergency')->default(false);
            $table->boolean('requested')->nullable(true);

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
