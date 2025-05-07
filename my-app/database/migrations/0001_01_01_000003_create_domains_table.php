<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->unique();
            $table->timestamp('registration_date')->useCurrent();
            $table->timestamp('expiration_date')->nullable();
            $table->string('status');
        });

        Schema::create('assignments', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('domain_id');
            $table->unsignedBigInteger('user_id');

            // Definir claves foráneas
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
        Schema::dropIfExists('assignments');
    }
};
