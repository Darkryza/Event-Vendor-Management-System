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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->text('agreement');
            $table->string('name_imgPoster');
            $table->string('size_imgPoster');
            $table->string('name_imgLayout');
            $table->string('size_imgLayout');
            $table->string('name_imgQR');
            $table->integer('Lot_Quantity');
            $table->integer('availabality')->default(0);
            $table->string('status')->default('Pending');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
