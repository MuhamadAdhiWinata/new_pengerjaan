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
        Schema::create('unggas', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jenis', 50)->nullable();
            $table->integer('jumlah')->default(0);
            $table->decimal('harga', 10, 2)->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unggas');
    }
};
