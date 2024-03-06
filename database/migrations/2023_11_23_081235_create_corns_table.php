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
        Schema::connection('second_db')->create('corns', function (Blueprint $table) {
    
            $table->id();
            $table->unsignedBigInteger('cornplanted');
            $table->unsignedBigInteger('cornquantity');
            $table->date('cornharvest_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('second_db')->dropIfExists('corns');
    }
};
