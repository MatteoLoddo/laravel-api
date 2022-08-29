<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            // foreing di post
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
            ->references('id')
            ->on('posts');
            


            // foreing di tags
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')
            ->references('id')
            ->on('tags');

            
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
        Schema::dropIfExists('post_tag');
    }
}