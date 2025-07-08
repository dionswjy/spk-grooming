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
        Schema::create('spk_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            // Data hasil perhitungan
            $table->json('result')->nullable(); // Hasil akhir ranking

            // Data pendukung
            $table->json('criteria_data')->nullable(); // Data kriteria yang digunakan
            $table->json('alternatives_data')->nullable(); // Data alternatif yang digunakan

            // Metadata
            $table->string('calculation_method')->default('SAW'); // Untuk fleksibilitas metode lain
            $table->text('notes')->nullable(); // Catatan tambahan

            $table->timestamps();
            $table->softDeletes(); // Untuk arsip data

            // Foreign key constraint
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

            // Index tambahan (beri nama agar bisa di-drop dengan aman)
            $table->index('created_at', 'spk_results_created_at_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spk_results', function (Blueprint $table) {
            // Drop FK
            $table->dropForeign(['user_id']);

            // Drop index yang kamu bikin manual (dengan nama sama)
            $table->dropIndex('spk_results_created_at_index');
        });

        Schema::dropIfExists('spk_results');
    }
};
