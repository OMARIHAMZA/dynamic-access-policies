<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyPurposesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_purposes', function (Blueprint $table) {
            $table->integer('policy_id')->unsigned();
            $table->integer('purpose_id')->unsigned();
        });

        Schema::table('policy_purposes', function(Blueprint $table) {
            $table->foreign('policy_id')->references('id')->on('policies')->onDelete('cascade');
            $table->foreign('purpose_id')->references('id')->on('purposes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy_purposes');
    }
}
