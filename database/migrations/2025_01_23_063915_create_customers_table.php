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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('type')->nullable();
            $table->string('phone');
            $table->text('address');
            $table->string('dob');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('national_id')->unique();
            $table->string('profession')->nullable();
            $table->string('company_name')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->text('special_notes')->nullable();
            $table->string('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
