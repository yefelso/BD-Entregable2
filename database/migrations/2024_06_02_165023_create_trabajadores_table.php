<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->timestamps();
        });

        // Obtener la fecha y hora actual
        $now = Carbon::now()->toDateTimeString();

        // Insertar cinco filas de ejemplo
        \DB::table('trabajadores')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'email' => 'juan@example.com',
                'telefono' => '1234567890',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'María',
                'apellido' => 'González',
                'email' => 'maria@example.com',
                'telefono' => '0987654321',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Rodríguez',
                'email' => 'carlos@example.com',
                'telefono' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Laura',
                'apellido' => 'López',
                'email' => 'laura@example.com',
                'telefono' => '5555555555',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nombre' => 'Pedro',
                'apellido' => 'Martínez',
                'email' => 'pedro@example.com',
                'telefono' => '6666666666',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
};
