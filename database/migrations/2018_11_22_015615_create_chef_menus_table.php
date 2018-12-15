<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChefMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chef_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chef_id');
            $table->string('name');
            $table->string('description');
            $table->mediumText('ingredients')->nullable();
            $table->integer('cook_time')->nullable();
            $table->integer('servings')->nullable();
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
        Schema::dropIfExists('chef_menus');
    }
}
