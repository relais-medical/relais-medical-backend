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
       Schema::create('offres', function (Blueprint $table) {
    $table->id();
    $table->string('reference')->unique();
    $table->foreignId('client_id')->constrained()->onDelete('cascade');
    $table->decimal('montant_total', 10, 2);
    $table->json('produits')->nullable();
    $table->integer('delai_livraison')->nullable();
    $table->integer('validite')->nullable();
    $table->enum('statut', ['En cours', 'Acceptée', 'Refusée'])->default('En cours');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
