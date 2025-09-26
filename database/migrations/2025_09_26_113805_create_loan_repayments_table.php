<?php

use App\Models\Loan;
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
        Schema::create('loan_repayments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Loan::class)->constrained()->cascadeOnDelete();
            $table->decimal('amount', 15, 2);
            $table->timestamp('repaid_at')->nullable();
            $table->enum('status', config('setting.loanRepaymentStatues'))->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_repayments');
    }
};
