<?php

use App\Models\GrantApplication;
use App\Models\GrantCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // This is a pivot table
    public function up(): void
    {
        Schema::create('grant_application_grant_category', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(GrantApplication::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(GrantCategory::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grant_application_grant_category');
    }
};
