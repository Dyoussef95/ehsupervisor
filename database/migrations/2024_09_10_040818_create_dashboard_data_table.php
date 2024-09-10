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
        Schema::create('dashboard_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('current_users')->nullable($value = true);
            $table->bigInteger('active_users')->nullable($value = true);
            $table->bigInteger('suspended_users')->nullable($value = true);
            $table->bigInteger('users_access')->nullable($value = true);
            $table->foreignId('client_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dashboard_data', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
        });
        Schema::dropIfExists('dashboard_data');
    }
};
