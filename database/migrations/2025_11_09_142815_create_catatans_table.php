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
Schema::create('catatans', function (Blueprint $table) {
    $table->id();
    $table->text('hash_dokumen')->nullable();
    $table->longText('digital_signature')->nullable();
    $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
    $table->foreignId('id_kategori')->constrained('kategoris')->onDelete('cascade');
    $table->string('judul');
    $table->text('isi');
    $table->string('lampiran')->nullable();
    $table->timestamps();
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatans');
    }
};
