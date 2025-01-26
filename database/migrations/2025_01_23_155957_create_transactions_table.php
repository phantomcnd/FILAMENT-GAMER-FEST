<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con la tabla users
            $table->string('game'); // Nombre del juego
            $table->decimal('amount', 10, 2); // Monto
            $table->enum('status', ['pending', 'verified'])->default('pending'); // Estado
            $table->string('receipt_path')->nullable(); // Ruta del comprobante
            $table->string('transaction_number')->nullable(); // Número del comprobante
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
