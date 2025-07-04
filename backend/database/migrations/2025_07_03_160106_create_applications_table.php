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
        Schema::create('applications', function( Blueprint $table ) {
            $table->id();
            $table->string('role');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->date('application_date')->nullable();
            $table->foreignId('status_id')->constrained();
            $table->text('notes')->nullable();
            $table->string('job_link')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
