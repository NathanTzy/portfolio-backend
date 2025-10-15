<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');       
            $table->string('company');      
            $table->string('start_year');   
            $table->string('end_year')->nullable();   
            $table->text('description')->nullable(); 
            $table->timestamps();           
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
