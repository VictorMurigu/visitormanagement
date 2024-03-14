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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
             $table->string('visitor_name');
            $table->string('visitor_meet_person');
            $table->string('visitor_department');
            $table->string('visitor_enter_time');
            $table->string('visitor_out_time')->nullable();
            $table->boolean('visitor_status')->default(1);
            $table->string('visitor_enter_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};