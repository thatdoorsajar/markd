<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_image');
            $table->string('title');
            $table->string('description');
            $table->text('content');
            $table->text('notes');
            $table->boolean('is_dead');
            $table->boolean('is_https');
            $table->unsignedInteger('folder_id')->nullable();
            $table->foreign('folder_id')->references('id')->on('folders');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
}
