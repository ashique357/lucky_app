<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('quiz_id');
            $table->string('question');
            $table->string('username');
            $table->integer('answer')->nullable();
            $table->boolean('is_winner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_winners');
    }
}
