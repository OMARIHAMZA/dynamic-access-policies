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
            $table->bigInteger('creator_id');
            $table->bigInteger('data_element');
            $table->string('name')->nullable(false);
            $table->json('rules')->nullable(false);

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
