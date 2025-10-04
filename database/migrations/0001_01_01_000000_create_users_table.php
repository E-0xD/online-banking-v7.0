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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('role')->default('user');

            $table->string('name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->unique()->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_code')->nullable();
            $table->dateTime('email_code_expires_at')->nullable();
            $table->string('phone')->nullable();

            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();

            $table->enum('title', config('setting.titles'))->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', config('setting.genders'))->nullable();
            $table->enum('marital_status', config('setting.maritalStatus'))->nullable();
            $table->enum('employment', config('setting.employments'))->nullable();

            $table->string('currency')->nullable();
            $table->enum('account_type', config('setting.accountTypes'))->nullable();
            $table->enum('account_state', config('setting.accountStates'))->default('Pending Verification');
            $table->text('account_state_message')->nullable();
            $table->decimal('account_limit', 15, 2)->default(500000);

            $table->string('should_transfer_fail')->default('No');
            $table->boolean('should_local_transfer_use_transfer_code')->default(0);

            $table->decimal('bitcoin_balance', 20, 8)->default(0);   // up to 20 digits, 8 decimal places
            $table->decimal('ethereum_balance', 20, 8)->default(0);

            $table->string('transaction_pin')->nullable();
            $table->string('transaction_pin_plain')->nullable();
            $table->string('account_number')->nullable();
            $table->decimal('account_balance', 15, 2)->default(0.00);

            $table->string('security_number')->nullable();
            $table->string('salary_range')->nullable();

            $table->string('next_of_kin_name')->nullable();
            $table->string('next_of_kin_address')->nullable();
            $table->string('next_of_kin_relationship')->nullable();
            $table->string('next_of_kin_age')->nullable();
            $table->string('next_of_kin_phone')->nullable();
            $table->string('next_of_kin_email')->nullable();

            $table->string('image')->nullable();

            $table->string('password')->nullable();
            $table->string('password_plain')->nullable();

            $table->boolean('two_factor_authentication')->default(0);
            $table->enum('kyc', config('setting.kyc'))->default('Pending');
            $table->enum('document_type', config('setting.documentTypes'))->nullable();
            $table->string('front_side')->nullable();
            $table->string('back_side')->nullable();

            $table->boolean('status')->default(1)->comment('For Admin Use Only');

            $table->dateTime('last_login_time')->nullable();
            $table->text('last_login_device')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
