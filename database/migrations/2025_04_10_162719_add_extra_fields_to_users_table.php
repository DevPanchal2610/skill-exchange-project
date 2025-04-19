<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 15)->nullable();
            $table->string('address', 255)->nullable();
            $table->unsignedBigInteger('city_id');
            $table->string('profile_picture', 150)->nullable();
            $table->boolean('isactive')->default(1);
            $table->boolean('isadmin')->default(0);
            $table->string('security_question', 255)->nullable();
            $table->string('security_answer', 255)->nullable();

            $table->foreign('city_id')->references('city_id')->on('cities');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropColumn([
                'phone',
                'address',
                'city_id',
                'profile_picture',
                'isactive',
                'isadmin',
                'security_question',
                'security_answer'
            ]);
        });
    }
};
