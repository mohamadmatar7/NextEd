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
        // Schema::create('attendances', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
        //     $table->boolean('attended');
        //     $table->string('reason')->nullable();
        //     $table->unique(['user_id', 'lesson_id']);
        //     $table->timestamps();

        // });
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->unsignedTinyInteger('status')->default(0)->comment('0: Present, 1: Absent with reason, 2: Absent without reason');
            $table->text('reason')->nullable()->comment('Reason for absence if status is 1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
