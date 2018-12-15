<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMiscDetailsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->longText('about')->after('picture')->nullable();
            $table->string('birthday')->after('phone')->nullable();
            $table->string('website')->after('country')->nullable();
            $table->string('twitter_url')->after('website')->nullable();
            $table->string('instagram_url')->after('website')->nullable();
            $table->string('facebook_url')->after('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('about');
            $table->dropColumn('birthday');
            $table->dropColumn('website');
            $table->dropColumn('facebook_url');
            $table->dropColumn('twitter_url');
            $table->dropColumn('instagram_url');
        });
    }
}
