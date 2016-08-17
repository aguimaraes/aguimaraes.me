<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGithubEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('github_events', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('type');
            $table->unsignedInteger('actor_id');
            $table->unsignedInteger('repo_id');
            $table->boolean('public');
            $table->unsignedInteger('org_id')->nullable();
            $table->timestamps();

            $table->foreign('actor_id')
                ->references('id')
                ->on('actors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('repo_id')
                ->references('id')
                ->on('repos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('org_id')
                ->references('id')
                ->on('orgs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('github_events');
    }
}
