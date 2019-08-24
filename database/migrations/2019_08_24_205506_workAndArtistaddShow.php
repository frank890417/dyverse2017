<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkAndArtistaddShow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('works',function($table){
            $table->boolean('show',1000)->default(true);
        });
        Schema::table('singers',function($table){
            $table->boolean('show',1000)->default(true);
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
        Schema::table('works',function($table){
            $table->dropColumn('show');
        });
        Schema::table('singers',function($table){
            $table->dropColumn('show');
        });
        
    }
}
