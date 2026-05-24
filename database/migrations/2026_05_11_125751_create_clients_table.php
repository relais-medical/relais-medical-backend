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
     Schema::create('clients', function (Blueprint $table) {
    $table->id();
    $table->string('nom');
    $table->string('ville')->nullable();
    $table->string('telephone')->nullable();
    $table->string('email')->nullable();
    $table->string('secteur')->nullable();
    $table->enum('type', ['Client', 'Prospect'])->default('Prospect');
    $table->decimal('ca_genere', 10, 2)->default(0);
    $table->text('notes')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
