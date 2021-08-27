<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_sharing_id');
            $table->foreign('user_sharing_id')->references('id')->on('users');
            $table->unsignedBigInteger('phone_id');
            $table->foreign('phone_id')->references('id')->on('phones')->cascadeOnDelete();
            $table->unsignedBigInteger('user_shares_id');
            $table->foreign('user_shares_id')->references('id')->on('users');
            $table->unique(['user_sharing_id', 'phone_id', 'user_shares_id']);
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
        Schema::dropIfExists('shares');
    }
}
