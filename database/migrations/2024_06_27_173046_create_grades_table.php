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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluator_id')->constrained('teams')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->foreignId('team_id')->constrained('teams')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->integer('design');
            $table->integer('usability');
            $table->integer('layout');
            $table->integer('implementation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
