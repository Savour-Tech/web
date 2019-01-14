<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventCatererPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_caterer_portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_caterer_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->mediumText('tags')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('event_caterer_portfolios');
    }
}
