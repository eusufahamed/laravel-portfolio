<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('projects', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('client_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('service_name');
            $table->string('thumbnail');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('technology_name');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->dateTime('end_date');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('projects');
    }
};
