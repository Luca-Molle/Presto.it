<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); 
            $table->timestamps();
        });

        $categories = [
            'Automobili', 
            'Biciclette', 
            'Informatica', 
            'Immobili', 
            'Sport', 
            'Abbigliamento',
            'Moto', 
            'Caravan e camper',
            'Elettrodomestici',
            'Strumenti musicali'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]); 
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
