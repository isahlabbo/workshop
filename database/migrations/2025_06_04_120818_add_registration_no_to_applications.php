<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Application;

class AddRegistrationNoToApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('registration_no')->nullable();
            $table->dropColumn('schedule_id');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->foreignId('application_id')->nullable();
        });

        foreach(Application::all() as $application){
            $application->update(['application'=>$application->registrationNo()]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('registration_no');
        });

        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn('application_id');
        });

    }
}
