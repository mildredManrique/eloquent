<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id'); //Método para llamar números positivos

            $table->string('title');

            $table->foreign('user_id')->references('id')->on('users'); //Método (foreign) para llamar una relación de tablas *User_id Es...
            //...el campos a relacionar, id es la referencia de los datos que queremos y USERS es la table en la que se encuentra la referencia.

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
        Schema::dropIfExists('posts');
    }
}
