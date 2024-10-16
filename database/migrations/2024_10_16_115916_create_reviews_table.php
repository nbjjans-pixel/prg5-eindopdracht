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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //in backend ontzichtbaar de user hebben niet via form. Je kan via blaze kijken wie er ingelogd is
            $table->text('review');
            $table->foreignId('user_id'); //eigenlijk house_id
            $table->timestamps(); //delete moet als form met een post. '@method DELETE'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
