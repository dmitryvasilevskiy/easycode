<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_channels', function (Blueprint $table) {
            $table->unsignedMediumInteger('pos')->default(100);
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('user_channels', function (Blueprint $table) {
            //
        });
    }
};