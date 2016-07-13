<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('login');
            $table->string('display_login');
            $table->string('gravatar_id');
            $table->string('url');
            $table->string('avatar_url');

            $table->primary('id');
            $table->index('login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actors');
    }
}
