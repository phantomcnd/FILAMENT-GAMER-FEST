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
        Schema::create('pagos_individuales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // Relación con la tabla users
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('post_id') // Relación con la tabla posts (juegos)
                ->constrained('posts')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->decimal('monto', 10, 2); // Monto del pago
            $table->string('numero_comprobante')->unique(); // Número único del comprobante
            $table->string('comprobante_pago'); // Ruta del comprobante
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente'); // Estado del pago
            $table->timestamp('fecha_pago')->useCurrent(); // Fecha del pago
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_individuales');
    }
};
