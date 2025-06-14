<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Application;

class ScheduleAllApplications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'application:schedule-register';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(Application::all() as $application){
            $application->update(['registration_no'=>$application->registrationNo()]);
            $application->programme()->allocateThisParticipant($application);
        }
    }
}
