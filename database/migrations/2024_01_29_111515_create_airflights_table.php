<?php


use App\Models\Airplane;
use App\Models\Airroute;
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
        Schema::create('airflights', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nameflight');
            $table->foreignIdFor(Airroute::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Airplane::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('data');
            $table->time('time');
            $table->string('comment')->nullable()->default(null);  //->change()
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('air_flights');
    }
};
