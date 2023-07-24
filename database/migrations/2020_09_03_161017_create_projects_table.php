<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up(){
    Schema::create('projects', function(Blueprint $table){
      $table->id();
      $table->string('title');
      $table->string('slug')->unique();
      $table->text('description');
      $table->integer('category_id')->unsigned();
      $table->integer('service_id')->unsigned();
      $table->integer('client_id')->unsigned();
      $table->integer('team_id')->unsigned();
      $table->tinyInteger('status')->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down(){
    Schema::dropIfExists('projects');
  }
}
