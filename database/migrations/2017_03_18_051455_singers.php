<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Singers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('singers',function($table){
            $table->increments('id');
            $table->string('name')->default('');
            $table->string('cover',500)->default('')->nullable();
            $table->string('link',500)->default('')->nullable();
            $table->string('description',1000)->default('')->nullable();
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
        Schema::drop('singers');
    }
}
