<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('street');
            $table->string('city');
            $table->string('country',40);
            $table->string('zip',10);
            $table->integer('price');
            $table->text('description');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
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
        Schema::dropIfExists('flyers');
    }
}
