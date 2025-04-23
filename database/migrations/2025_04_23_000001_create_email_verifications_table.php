<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('email_verifications', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique();
            $table->longText('data'); // serialized registration data
            $table->timestamp('created_at')->nullable();
        });
    }
    public function down() {
        Schema::dropIfExists('email_verifications');
    }
};
