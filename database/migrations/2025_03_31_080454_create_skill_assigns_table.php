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
        Schema::create('skill_assigns', function (Blueprint $table) {
            $table->id('skill_assgin_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('assgin_id');
            $table->foreign('assgin_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('skill_id')->on('skills')->onDelete('cascade');
            $table->boolean('isactive')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_assigns');
    }
};
