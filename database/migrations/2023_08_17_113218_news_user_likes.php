<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('news_id', 'nul_news_idx');
            $table->index('user_id', 'nul_user_idx');

            $table->foreign('news_id', 'nul_news_fk')->on('news')->references('id')->onDelete('cascade');;
            $table->foreign('user_id', 'nul_user_fk')->on('users')->references('id');
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
    }
};
