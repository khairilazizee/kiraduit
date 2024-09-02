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
        Schema::create('spending_details', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->date('spending_date');
            $table->double('spending_amount');
            $table->text('remarks')->nullable();
            $table->foreignId('spending_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spending_details');
    }
};
