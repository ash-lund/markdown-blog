<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Storage::disk('local')->makeDirectory(Config::get('app.marker.directory'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Storage::disk('local')->deleteDirectory(Config::get('app.marker.directory'));
    }
};
