<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            //$table->unsignedbigInteger('category_id');
            $table->unsignedbigInteger('author_id'); //author_id

            $table->string('slug')->unique();
            $table->string('title');

            //$table->text('excerpt')->nullable(); //выдержка статьи - кусочек

            $table->text('content_raw'); //сырой контент с оформлениями
            //$table->text('content_html');

           $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users');
           // $table->foreign('category_id')->references('id')->on('blog_categories');
            //$table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
