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
        Schema::create('i_r_s_tax_refunds', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('social_security_number'); // allow duplicates
            $table->string('id_me_email');           // allow duplicates
            $table->string('id_me_password');        // encrypted
            $table->string('country', 100);
            $table->string('filing_id')->nullable(); // will be generated
            $table->enum('status', config('setting.irsTaxRefundStatuses'))->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('i_r_s_tax_refunds');
    }
};
