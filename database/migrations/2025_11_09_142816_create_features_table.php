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
    Schema::create('features', function (Blueprint $table) {
        $table->id('id_feature');
        $table->foreignId('id_catatan')->constrained('catatans')->onDelete('cascade');
        $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
        $table->integer('like')->default(0);
        $table->text('comment')->nullable();
        $table->boolean('bookmark')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
