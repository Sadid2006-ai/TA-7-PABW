<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('judul', 150);
            $table->string('kategori', 50);
            $table->text('ringkasan');
            $table->string('gambar');              // path gambar di disk public
            $table->string('dokumen');             // path dokumen di disk public
            $table->string('nama_asli_dokumen');   // nama file asli untuk diunduh
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ides');
    }
};