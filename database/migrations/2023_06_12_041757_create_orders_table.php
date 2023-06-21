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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('artist_id')->constrained('artists');
            $table->foreignUuid('user_id')->constrained('users');
            $table->unsignedBigInteger('commissions_id');
            $table->foreign('commissions_id')->references('id')->on('commissions');        
            $table->string('session_id'); 
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
