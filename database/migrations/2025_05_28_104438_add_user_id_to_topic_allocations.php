<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToTopicAllocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_allocations', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        
        Schema::table('topic_allocations', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_allocations', function (Blueprint $table) {
            //
        });
    }
}
