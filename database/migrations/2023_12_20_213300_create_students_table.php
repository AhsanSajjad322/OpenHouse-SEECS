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
        Schema::create('students', function (Blueprint $table) {
            $table->id('id');
            $table->string('name')->required();
            $table->string('email')->required()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->required();
            // $table->enum('role',['S', 'E', 'A'])->required();
            $table->unsignedBigInteger('project_id')->unsigned();
            $table->rememberToken();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
