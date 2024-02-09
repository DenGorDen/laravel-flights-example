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
        Schema::create('airroutes', function (Blueprint $table) {
           $table->id();
           // $table->timestamps();
           $table->string('nameline');
           $table->foreignId('startcity')->constrained('airports','id')->cascadeOnDelete()->cascadeOnUpdate();
           $table->foreignId('finishcity')->constrained('airports','id')->cascadeOnDelete()->cascadeOnUpdate();
           $table->integer('distancion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airroutes');
    }
};
