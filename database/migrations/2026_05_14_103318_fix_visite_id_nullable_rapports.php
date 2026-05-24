<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rapports', function (Blueprint $table) {
            \DB::statement('ALTER TABLE rapports MODIFY visite_id BIGINT UNSIGNED NULL');
        });
    }

    public function down(): void
    {
        Schema::table('rapports', function (Blueprint $table) {
            \DB::statement('ALTER TABLE rapports MODIFY visite_id BIGINT UNSIGNED NOT NULL');
        });
    }
};