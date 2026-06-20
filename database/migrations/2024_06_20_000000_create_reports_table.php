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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();          // = the public URL path (e.g. "year-report-2005")
            $table->string('title');                   // page heading / H1
            $table->string('chip_label')->nullable();  // short label shown on the timeline chip
            $table->integer('year')->index();
            $table->enum('category', ['report', 'event'])->default('report');
            $table->string('icon')->default('description'); // Material Symbol name for the chip
            $table->longText('body')->nullable();      // raw HTML body
            $table->integer('sort_order')->default(0); // ordering within a year
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
