<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Create the tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique(); // Slug for the tag (URL-friendly identifier)
            $table->timestamps();
            $table->softDeletes();
        });

        // Create the taggables table (polymorphic relationship table)
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade'); // Foreign key to the tags table
            $table->morphs('taggable'); // Polymorphic columns: taggable_id, taggable_type
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('');
    }
};
