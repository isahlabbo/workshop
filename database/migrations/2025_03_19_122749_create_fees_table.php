<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Workshop;
use App\Models\Fee;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->timestamps();
        });

        $fees = [
            'Tuition',
            'Facilitation',
            'Portal',
            'Certificate Processing',
            'Maintenance',
            'Materials',
            'Use of Resouces',
            'Mentorship',
        ];

        foreach($fees as $fee){
            App\Models\Fee::firstOrCreate(['item'=>$fee]);
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees');
    }
}
