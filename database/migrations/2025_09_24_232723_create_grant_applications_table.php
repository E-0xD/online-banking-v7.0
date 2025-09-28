<?php

use App\Models\User;
use App\Models\GrantCategory;
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
        Schema::create('grant_applications', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');

            $table->enum('type', config('setting.grantApplicationTypes'));

            $table->string('name')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('organization_type')->nullable();
            $table->year('founding_year')->nullable();
            $table->text('full_mailing_address')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_person')->nullable();
            $table->text('mission_statement')->nullable();
            $table->date('date_of_incorporation')->nullable();
            $table->string('project_title')->nullable();
            $table->longText('project_description')->nullable();
            $table->longText('expected_outcome')->nullable();
            $table->decimal('amount', 15, 2);

            $table->enum('status', config('setting.grantApplicationStatues'))->default('Pending');
            $table->text('review_notes')->nullable();
            $table->string('reference_id')->nullable();
            $table->timestamp('submitted_at')->useCurrent();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grant_applications');
    }
};
