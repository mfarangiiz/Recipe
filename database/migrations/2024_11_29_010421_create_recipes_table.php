<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */


     public function up()
     {
         Schema::create('recipes', function (Blueprint $table) {
             $table->id();
             $table->string('user')->nullable();
             $table->string('name');
             $table->text('ingredients');
             $table->text('instructions');
             $table->integer('status')->default(0);
             $table->string('image')->nullable();
             $table->timestamps();
         });
     }

     public function down()
     {
        Schema::table('recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });

     }
};
