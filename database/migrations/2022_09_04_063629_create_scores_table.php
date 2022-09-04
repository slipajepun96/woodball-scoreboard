<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->foreign('gameplayer_id')->references('id')->on('gameplayer');
            $table->bigInteger('gameplayer_id');
            $table->integer('game_id');
            $table->integer('player_id');
            $table->string('sex');
            $table->integer('gate_1')->nullable();
            $table->integer('gate_2')->nullable();
            $table->integer('gate_3')->nullable();
            $table->integer('gate_4')->nullable();
            $table->integer('gate_5')->nullable();
            $table->integer('gate_6')->nullable();
            $table->integer('gate_7')->nullable();
            $table->integer('gate_8')->nullable();
            $table->integer('gate_9')->nullable();
            $table->integer('gate_10')->nullable();
            $table->integer('gate_11')->nullable();
            $table->integer('gate_12')->nullable();
            $table->integer('final_score')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
};
