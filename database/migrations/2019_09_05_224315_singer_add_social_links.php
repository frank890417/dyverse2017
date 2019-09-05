<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SingerAddSocialLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('singers',function($table){
            $table->string('link_netease',1000)->default("");
            $table->string('link_ig',1000)->default("");
            $table->string('link_youtube',1000)->default("");

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
        Schema::table('singers',function($table){
            $table->dropColumn('link_netease',1000);
            $table->dropColumn('link_ig',1000);
            $table->dropColumn('link_youtube',1000);

        });
    }
}
