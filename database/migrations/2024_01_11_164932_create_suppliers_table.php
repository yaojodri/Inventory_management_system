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
        // Create the 'suppliers' table
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Primary key for the supplier
            $table->string('name'); // Name of the supplier
            $table->text('address')->nullable(); // Supplier's address (optional)
            $table->string('phone')->nullable(); // Supplier's phone number (optional)
            $table->string('email')->nullable()->unique(); // Supplier's email (optional, unique)
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'suppliers' table when rolling back the migration
        Schema::dropIfExists('suppliers');
    }
};
