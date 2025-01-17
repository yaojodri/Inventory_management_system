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
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing 'id' column
            $table->unsignedBigInteger('user_id'); // Foreign key reference to 'users' table
            $table->string('action'); // Action field
            $table->text('description')->nullable(); // Description of the report
            
            // Optionally, you can add a foreign key constraint (assuming you have a users table)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
