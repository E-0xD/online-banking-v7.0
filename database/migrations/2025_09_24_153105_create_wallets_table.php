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
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name', 50); // e.g., Bitcoin Wallet
            $table->string('symbol', 10); // e.g., BTC, ETH
            $table->string('address', 255); // Public blockchain address
            $table->string('network', 50); // e.g., Bitcoin Mainnet, ERC20
            $table->string('qr_code_path', 255)->nullable(); // QR code file path
            $table->decimal('balance', 30, 8)->default(0.00000000); // Cached balance
            $table->enum('status', config('setting.walletStatuses'))->default('Active');
            $table->text('description')->nullable(); // Extra notes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
