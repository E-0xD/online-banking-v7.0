<?php

use App\Models\User;
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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            // Relationship
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            // Sender
            $table->string('sender_account_number');
            $table->string('sender_bank')->nullable(); // useful for local transfers

            // Recipient
            $table->string('recipient_name');
            $table->string('recipient_account_number')->nullable();
            $table->string('recipient_bank')->nullable();
            $table->string('recipient_swift_code')->nullable(); // for international
            $table->string('recipient_routing_number')->nullable(); // for international
            $table->string('recipient_iban_code')->nullable(); // for international
            $table->string('recipient_country')->nullable();
            $table->string('recipient_account_type')->nullable();

            // Transfer Details
            $table->decimal('amount', 15, 2);
            $table->string('currency')->nullable();
            $table->enum('transfer_type', config('setting.transferTypes'));
            $table->text('description')->nullable();

            // Status tracking
            $table->enum('status', config('setting.transferStatuses'))->default('pending');

            // Extended Banking Features
            $table->string('reference_id')->unique(); // unique transaction reference
            $table->decimal('fee', 15, 2)->default(0.00); // transfer fee
            $table->decimal('exchange_rate', 15, 6)->nullable(); // if applicable
            $table->decimal('converted_amount', 15, 2)->nullable(); // amount after FX conversion
            $table->boolean('is_reversed')->default(false); // reversal flag

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
