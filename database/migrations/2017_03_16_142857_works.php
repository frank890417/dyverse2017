<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Works extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('works',function($table){
            $table->increments('id');
            $table->string("title")->default('');
            $table->string("image")->default('')->nullable();
            $table->string("discription",2000)->default('')->nullable();
            $table->string("work",500)->default('')->nullable();
            $table->string("date")->default('')->nullable();
            $table->string("company")->default('')->nullable();
            $table->string("work_url",500)->default('')->nullable();
            $table->string("company_url",500)->default('')->nullable();
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
        Schema::drop('works');
    }
}
