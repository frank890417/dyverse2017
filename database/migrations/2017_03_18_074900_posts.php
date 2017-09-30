<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts',function($table){
          $table->increments('id');
          $table->string('title',200)->default('');
          $table->string('tag',20)->default('')->nullable();
          $table->string('cover',900)->default('')->nullable();
          $table->string('link',900)->default('')->nullable();
          $table->string('description',500)->default('')->nullable();
          $table->string('author',50)->default('')->nullable();
          $table->text('content')->nullable();
          $table->string('album',5000)->default('')->nullable();
          $table->dateTime('established_time')->nullable();
          $table->integer('visited_count')->default(0)->nullable();
          $table->string('status',20)->default('draft')->nullable();
          // $table->string('company',10)->default('');
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
        //
        Schema::dropIfExists('posts');
    }
}
