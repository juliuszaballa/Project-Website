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
        Schema::connection('third_db')->create('registers', function (Blueprint $table) {
            $table->id(); 
            $table->boolean('mark')->default(false);
           
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('extension_name')->default('.')->nullable();         
            $table->string('address');
            $table->string('crop_type');
            $table->string('farm_type');
            $table->unsignedBigInteger('land_area');
            $table->double('latitude', 10, 6);
            $table->double('longitude', 10, 6);
            $table->string('sex');
            $table->string('purok');
            $table->string('tenurial');
            $table->string('other')->nullable();
            $table->string('barangay');
            $table->string('phone');
            $table->string('north');
            $table->string('east');
            $table->string('west');
            $table->string('south');
            $table->date('Bdate');        
            $table->string('wife')->nullable();
            $table->string('benificiary');
            $table->string('bankname');
            $table->unsignedBigInteger('bankAccount');
            $table->unsignedBigInteger('amountCover');
            $table->string('sowing');
            $table->string('planting');
            $table->unsignedBigInteger('harvest');
            $table->string('status');
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('third_db')->dropIfExists('registers');
    }
};
