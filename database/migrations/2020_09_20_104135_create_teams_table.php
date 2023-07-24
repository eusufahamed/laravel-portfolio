<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up(){
    Schema::create('teams', function(Blueprint $table){
      $table->id();
      $table->string('name');
      $table->string('slug')->unique();
      $table->string('title');
      $table->string('designation');
      $table->string('address');
      $table->integer('phone');
      $table->string('email');
      $table->string('resume');
      $table->text('description');
      $table->string('image');
      $table->timestamps();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down(){
    Schema::dropIfExists('teams');
  }
}
