<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_service', function (Blueprint $table) {
            $table->primary(['post_id', 'service_id']);
            $table->foreignId('post_id')->constrained('posts')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('services')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_service');
    }
}
