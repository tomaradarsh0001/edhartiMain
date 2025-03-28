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
        Schema::create('property_contact_details_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_master_id')->constrained();
            $table->string('address')->nullable();
            $table->string('new_address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('new_phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('new_mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->string('new_email')->nullable();
            $table->boolean('is_active')->nullable();
            $table->boolean('new_is_active')->nullable();

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_contact_details_histories');
    }
};
