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
            $table->string('url_given');
            $table->string('url_resolved')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->text('content')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('domain_id')->nullable();
            $table->foreign('domain_id')->references('id')->on('domains');
            $table->unsignedInteger('folder_id')->nullable();
            $table->foreign('folder_id')->references('id')->on('folders');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();

            // $table->string('mime_type');
            // $table->string('encoding');
            // $table->string('response_code');
            // $table->string('lang');
            // $table->boolean('is_article');
            // $table->boolean('has_image');
            // $table->boolean('has_video');
            // $table->boolean('is_dead');
            // $table->boolean('is_https');
        });
    }
}
