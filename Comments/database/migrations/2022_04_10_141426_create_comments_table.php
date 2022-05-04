<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');


            //$table->unsignedbigInteger('author_id')->index();
           $table->unsignedBigInteger('parent_id')->index()->nullable();;
           $table->unsignedBigInteger('post_id')->index();

            $table->text('content_raw');

           // $table->integer('parent_id');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            //Создаем связь между таблицами
            $table->foreign('post_id')->references('id')->on('posts');
           //$table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
