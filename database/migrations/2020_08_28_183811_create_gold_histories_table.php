<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoldHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gold_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('user_name');
            $table->integer('gold');
            $table->integer('balance');
            $table->string('des');
            $table->timestamp('date');
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
        Schema::dropIfExists('gold_histories');
    }
}
