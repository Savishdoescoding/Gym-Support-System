<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
    This file is for the notes per user logging in.
    It creates a table for the notes and allows users to create, view, and manage their notes.
    Each note is associated with a user and can have a title, content, and category.
    The categories are predefined to help users organize their notes effectively.
*/

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('title')->nullable();
            $table->text('content');
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }

};
