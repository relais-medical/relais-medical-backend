<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('poste')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    public function down(): void {
        Schema::dropIfExists('contacts');
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};