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
        Schema::table('tasks', function (Blueprint $table) {
            // Drop the old column
            $table->dropColumn('priority');
        });

        Schema::table('tasks', function (Blueprint $table) {
            // Add the new enum column
            $table->enum('priority', ['low', 'medium', 'high', 'urgent', 'outage'])->default('low');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Revert back to string if needed
            $table->dropColumn('priority');
        });

         Schema::table('tasks', function (Blueprint $table) {
            $table->string('priority')->default('low');
        });
    }
};
