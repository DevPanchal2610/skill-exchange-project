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
        Schema::table('skill_assigns', function (Blueprint $table) {
            $table->unsignedBigInteger('user_skill_id')->after('skill_id');
            $table->foreign('user_skill_id')->references('skill_id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skill_assigns', function (Blueprint $table) {
            $table->dropForeign(['user_skill_id']);
            $table->dropColumn('user_skill_id');
        });
    }
};
