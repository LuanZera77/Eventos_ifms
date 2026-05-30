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
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("local");
            $table->enum("status",["aberto","em_andamento","fechado","encerrado"])->default("fechado");
            $table->date("data");
            $table->timestamps();
        });
    }
//  nome, data, local e status (aberto/encerrado).
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento');
    }
};

