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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->enum('method', config('setting.depositMethods'));
            $table->decimal('amount', 15, 2);
            $table->string('proof')->nullable();
            $table->enum('status', config('setting.depositStatuses'))->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('reference_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
