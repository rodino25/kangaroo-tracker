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
        Schema::create('kangaroos', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("nickname")->nullable();
            $table->float("weight");
            $table->float("height");
            $table->enum("gender", ["male", "female"]);
            $table->string("color")->nullable();
            $table->string("friendliness")->nullable();
            $table->date("birthday");
            $table->unsignedBigInteger("user_id")->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kangaroos');
    }
};
