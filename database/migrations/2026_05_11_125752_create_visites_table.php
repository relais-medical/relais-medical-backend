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
        Schema::create('visites', function (Blueprint $table) {
    $table->id();
    $table->foreignId('client_id')->constrained()->onDelete('cascade');
    $table->date('date');
    $table->time('heure');
    $table->enum('type_visite', ['Prospection', 'Suivi', 'Présentation']);
    $table->enum('priorite', ['Haute', 'Moyenne', 'Basse'])->default('Moyenne');
    $table->text('objectif')->nullable();
    $table->text('compte_rendu')->nullable();
    $table->text('prochaine_action')->nullable();
    $table->enum('statut', ['Prévue', 'Réalisée', 'En attente', 'Annulée'])->default('Prévue');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
