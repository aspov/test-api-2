<?php

use App\Models\Classroom;
use App\Models\Lecture;
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
        Schema::create('lecture_classroom', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classroom::class)->constrained();
            $table->foreignIdFor(Lecture::class)->constrained();
            $table->timestamps();
            $table->unique(['classroom_id', 'lecture_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecture_classroom');
    }
};
