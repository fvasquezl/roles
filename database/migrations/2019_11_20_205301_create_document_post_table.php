<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('post_id');

            $table->foreign('document_id')
            ->references('id')
            ->on('documents')
            ->onDelete('cascade');
            
            $table->foreign('post_id')
            ->references('id')
            ->on('posts')
            ->onDelete('cascade');
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
        Schema::dropIfExists('document_post');
    }
}
