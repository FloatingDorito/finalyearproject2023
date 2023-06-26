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
        Schema::create('commissions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('artist_id')->constrained('artists');
            $table->string('coverimage');
            $table->string('title');
            $table->integer('price');
            $table->longText('description');
            $table->longText('expectations');
            $table->longText('likes');
            $table->longText('dislikes');
            $table->boolean('status');
            $table->string('exampleimageone')->nullable();
            $table->string('exampleimagetwo')->nullable();
            $table->string('exampleimagethree')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
