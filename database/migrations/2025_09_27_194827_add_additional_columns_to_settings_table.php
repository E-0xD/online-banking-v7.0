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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('paypal_email')->nullable()->after('virtual_card_fee');

            $table->string('bank_name')->nullable()->after('paypal_email');
            $table->string('account_name')->nullable()->after('bank_name');
            $table->string('account_number')->nullable()->after('account_name');
            $table->string('routing_number')->nullable()->after('account_number');
            $table->text('bank_address')->nullable()->after('routing_number');
            $table->string('bank_swift_code')->nullable()->after('bank_address');
            $table->string('bank_iban')->nullable()->after('bank_swift_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'paypal_email',
                'bank_name',
                'account_name',
                'account_number',
                'routing_number',
                'bank_address',
                'bank_swift_code',
                'bank_iban',
            ]);
        });
    }
};
