<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->string('foto', 2048)->nullable();
            $table->integer('estado')->default(1);
            //$table->foreign('id_categoria')->references('id_categoria')->on('categoria')-cascadeOnUpdate()-nullOnDelete();
            $table->foreignId('id_categoria')->nullable()->constrained('categoria')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
};
