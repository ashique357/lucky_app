<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draw_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('lucky_entry_number');
            $table->boolean('status')->default(0); //0=>shuffle; 1=>publish
            $table->foreignId('user_id')->default(0);
            $table->integer('lottery_id')->nullable();
            $table->string('date');
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
        Schema::dropIfExists('draw_histories');
    }
}
