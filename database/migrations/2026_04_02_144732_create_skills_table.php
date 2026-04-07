<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();        // path to uploaded logo
            $table->string('category')->nullable();    // e.g., "Backend", "Frontend", "Tools"
            $table->integer('proficiency')->nullable(); // 1-100
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};