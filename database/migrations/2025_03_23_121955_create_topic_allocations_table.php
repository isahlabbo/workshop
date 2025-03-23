<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('topic_id');
            $table->foreignId('schedule_id');
            $table->string('title')->default('major');
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
        Schema::dropIfExists('topic_allocations');
    }
}
