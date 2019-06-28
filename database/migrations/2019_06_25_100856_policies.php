<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Policies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->bigIncrements('policy_id');
            $table->bigInteger('creator_id');
            $table->bigInteger('data_element');
            $table->string('name')->nullable(false);
            $table->json('rules')->nullable(true);
            $table->json('emergency_rules')->nullable(true);

            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('data_element')->references('table_id')->on('external_tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policies');
    }
}
