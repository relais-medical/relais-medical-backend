<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offre_produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offre_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->integer('quantite')->default(1);
            $table->decimal('prix_unitaire', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offre_produits');
    }
};