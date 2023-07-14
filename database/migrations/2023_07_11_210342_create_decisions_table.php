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
        Schema::create('decisions', function (Blueprint $table) {
          $table->id();
          $table->string('registration_number');
          $table->string('full_name')->nullable();
          $table->text('narration')->nullable();
          $table->text('decision')->nullable();
          $table->string('academic_session')->nullable();
          $table->string('semester')->nullable();
          $table->string('senate_meeting_number')->nullable();
          $table->text('note')->nullable();
          $table->text('case')->nullable();
          $table->string('duration')->nullable();
          $table->timestamps();
          $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decisions');
    }
};
