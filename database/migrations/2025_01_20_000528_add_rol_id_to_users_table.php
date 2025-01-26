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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('rol_id') // Agrega la columna rol_id
                ->nullable() // Permite valores nulos si el usuario no tiene un rol asignado
                ->constrained('roles') // Configura la clave foránea apuntando a la tabla roles
                ->cascadeOnDelete(); // Elimina los usuarios si el rol asociado es eliminado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['rol_id']); // Elimina la relación de clave foránea
            $table->dropColumn('rol_id'); // Elimina la columna rol_id
        });
    }
};
