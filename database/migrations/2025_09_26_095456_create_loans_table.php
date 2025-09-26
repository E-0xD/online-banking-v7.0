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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            // Loan details
            $table->decimal('amount', 15, 2); // requested loan amount
            $table->unsignedInteger('duration'); // in months
            $table->string('facility'); // loan/credit facility type
            $table->text('purpose'); // purpose of loan
            $table->string('monthly_income'); // option selected

            // Loan status & tracking
            $table->enum('status', config('setting.loanStatuses'))
                ->default('pending');
            $table->decimal('approved_amount', 15, 2)->nullable(); // if bank approves less than requested
            $table->decimal('interest_rate', 5, 2)->nullable(); // % rate
            $table->decimal('total_payable', 15, 2)->nullable(); // amount + interest
            $table->date('disbursed_at')->nullable(); // when funds released

            // Admin actions
            $table->text('remarks')->nullable(); // rejection reason / notes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
