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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            // Basic info
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);

            // Father details
            $table->string('father_first_name', 50);
            $table->string('father_middle_name', 50)->nullable();
            $table->string('father_last_name', 50);

            // Contact
            $table->string('email')->nullable();
            $table->string('phone', 10);

            // Important fields
            $table->date('dob');       // FIXED: Use date type
            $table->string('aadhar', 12)->unique();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
