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
        Schema::create('rapports', function (Blueprint $table) {
    $table->id();
    $table->foreignId('visite_id')->nullable()->constrained()->onDelete('cascade');
    $table->foreignId('client_id')->constrained()->onDelete('cascade');
    $table->date('date');
    $table->enum('type_visite', ['Prospection', 'Suivi', 'Présentation']);
    $table->text('compte_rendu')->nullable();
    $table->integer('interet_client')->default(3);
    $table->text('prochaine_action')->nullable();
    $table->enum('statut', ['Réalisée', 'En attente', 'Annulée'])->default('Réalisée');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
