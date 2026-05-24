<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->decimal('montant_total', 10, 2)->default(0);
            $table->string('statut')->default('En cours');
            $table->integer('delai_livraison')->default(15);
            $table->integer('validite')->default(30);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};