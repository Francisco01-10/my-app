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
        Schema::create('userlogs', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique(); // No auto_increment
            $table->string('user');
            $table->string('rip', 45); // IP remota

            $table->timestamp('login_time')->useCurrent(); // Fecha y hora
            $table->string('method'); // Método de login
            $table->string('lip', 45); // IP local
            $table->boolean('tls')->default(false);

            // Clave primaria compuesta
            $table->primary(['user', 'rip']);

        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userlogs');
    }
};
