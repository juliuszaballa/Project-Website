<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarvestsTable extends Migration
{
    public function up(): void
    {
        Schema::connection('second_db')->create('harvests', function (Blueprint $table) {
            $table->id();
           
         
            $table->unsignedBigInteger('planted');
            $table->unsignedBigInteger('quantity');
            $table->date('harvest_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('second_db')->dropIfExists('harvests');
    }
}

