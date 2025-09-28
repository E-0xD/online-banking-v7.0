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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->enum('type', config('setting.transactionTypes'))->index();
            $table->enum('direction', config('setting.transactionDirections'))->index();
            $table->string('description')->nullable();
            $table->decimal('amount', 15, 2);
            $table->decimal('current_balance', 15, 2);
            $table->timestamp('transaction_at');
            $table->string('reference_id');
            $table->enum('status', config('setting.transactionStatuses'))->default('pending')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
