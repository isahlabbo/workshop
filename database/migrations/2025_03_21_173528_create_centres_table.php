<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('capacity');
            $table->string('contact');
            $table->timestamps();
        });

        $centres = [
            [
                'name'=>'Catsol Global Concept', 
                'address'=>'Behind Umaru Ali Shinkafi Polytechnic',
                'capacity'=>12,
                'contact'=> '08162463010'
            ]
            ];
        foreach($centres as $centre){
            App\Models\Centre::firstOrCreate($centre);
        }    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centres');
    }
}
