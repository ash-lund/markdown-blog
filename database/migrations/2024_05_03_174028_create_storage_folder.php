<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Storage::disk('local')->makeDirectory('markdown');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Storage::disk('local')->deleteDirectory('markdown');
    }
};
