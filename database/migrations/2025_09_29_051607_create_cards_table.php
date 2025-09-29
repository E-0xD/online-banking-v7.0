<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            // Relationship (User that owns the card)
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            // Card Details
            $table->enum('card_type', config('setting.cardTypes'))->default('Visa');
            $table->string('card_level'); // e.g., Silver, Gold, Platinum etc
            $table->string('currency', 50); // e.g., USD, EUR, NGN
            $table->decimal('daily_limit', 15, 2)->default(100.00); // Daily spending limit


            // Auto-generated card details (when issuing card)
            $table->string('card_number')->nullable()->unique(); // e.g., 16-digit number
            $table->string('expiry_date')->nullable(); // MM/YY
            $table->string('cvv')->nullable(); // 3-4 digit code

            // Billing Information
            $table->string('card_holder_name');
            $table->string('billing_address');
            $table->string('city')->nullable();
            $table->string('zip', 20)->nullable();

            // Reference ID
            $table->string('reference_id')->nullable();

            // System/Status
            $table->enum('status', config('setting.cardStatuses'))
                ->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
