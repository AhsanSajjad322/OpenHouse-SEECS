<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('detail', $length=500)->nullable();
            $table->float('marks')->nullable();
            $table->enum('status',['Marked','In Progress', 'No Evaluator Assigned'])->required()->default("No Evaluator Assigned");

            $table->unsignedBigInteger('location_id')->unsigned()->unique()->nullable();
            $table->unsignedBigInteger('category_id')->unsigned()->default(null)->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
