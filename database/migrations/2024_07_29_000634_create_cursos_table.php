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
        Schema::create('cursos', function (Blueprint $table) {
            $table->uuid("id_curso")->primary();
            $table->string("nombre_curso",90);
            $table->text("descripcion")->nullable();
            $table->float("precio");
            $table->smallInteger("vacantes");
            $table->string("imagen")->nullable();

            $table->foreignUuid("categoria_id")
            ->constrained("categorias","id_categoria")
            ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
