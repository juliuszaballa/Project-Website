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
        Schema::connection('second_db')->create('coconuts', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('coconutquantity');
            $table->date('coconutharvest_date');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('second_db')->dropIfExists('coconuts');
    }
};
