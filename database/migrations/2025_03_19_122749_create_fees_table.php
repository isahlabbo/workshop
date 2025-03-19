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
            $table->string('amount');
            $table->timestamps();
        });

        $fees = [
            ['item'=>'Tuition','amount'=>5000],
            ['item'=>'Facilitation','amount'=>2000],
            ['item'=>'Portal','amount'=>500],
            ['item'=>'Certificate Processing','amount'=>3000],
            ['item'=>'Maintenance','amount'=>1200],
            ['item'=>'Resources','amount'=>2000],
        ];

        foreach($fees as $fee){
            App\Models\Fee::firstOrCreate($fee);
        }
        foreach(Workshop::all() as $workshop){
            foreach(Fee::all() as $fee){
                $workshop->workshopFees()->create(['fee_id'=>$fee->id]);
            }
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
