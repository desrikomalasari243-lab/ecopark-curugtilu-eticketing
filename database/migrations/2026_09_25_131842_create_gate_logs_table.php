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
        Schema::create('gate_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_code');
        $table->string('gate_name')->default('Gate Utama');
        $table->enum('scan_status', ['success', 'rejected']);
        $table->unsignedBigInteger('scanned_by')->nullable();
        $table->timestamp('scanned_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gate_logs');
    }
};
