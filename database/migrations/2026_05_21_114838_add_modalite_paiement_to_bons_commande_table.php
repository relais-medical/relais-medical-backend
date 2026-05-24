<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('bons_commande', function (Blueprint $table) {
            $table->string('modalite_paiement')->nullable()->default('Non défini');
        });
    }

    public function down(): void {
        Schema::table('bons_commande', function (Blueprint $table) {
            $table->dropColumn('modalite_paiement');
        });
    }
};