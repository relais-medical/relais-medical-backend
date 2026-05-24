<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('offres', function (Blueprint $table) {
            if (!Schema::hasColumn('offres', 'date')) {
                $table->date('date')->nullable()->after('client_id');
            }
            if (!Schema::hasColumn('offres', 'reference')) {
                $table->string('reference')->unique()->after('id');
            }
            if (!Schema::hasColumn('offres', 'montant_total')) {
                $table->decimal('montant_total', 10, 2)->default(0)->after('date');
            }
            if (!Schema::hasColumn('offres', 'statut')) {
                $table->string('statut')->default('En cours')->after('montant_total');
            }
            if (!Schema::hasColumn('offres', 'delai_livraison')) {
                $table->integer('delai_livraison')->default(15)->after('statut');
            }
            if (!Schema::hasColumn('offres', 'validite')) {
                $table->integer('validite')->default(30)->after('delai_livraison');
            }
        });
    }

    public function down(): void
    {
        Schema::table('offres', function (Blueprint $table) {
            $table->dropColumn(['date', 'reference', 'montant_total', 'statut', 'delai_livraison', 'validite']);
        });
    }
};