<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['social', 'cultural', 'esportivo', 'corporativo', 'religioso', 'entretenimento', 'outros']);
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->text('address');
            $table->string('address_link')->nullable();
            $table->dateTime('start_datetime');
            $table->decimal('price', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
