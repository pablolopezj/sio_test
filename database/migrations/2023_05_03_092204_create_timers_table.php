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
        Schema::create('timers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('start_at');
            $table->timestamp('stopped_at')->default(null)->nullable();
            $table->integer('logged_time')->default(null)->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timers');
    }
};
