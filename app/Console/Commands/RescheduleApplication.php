<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Application;

class RescheduleApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'application:re-schedule';

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
       foreach(Application::where('schedule_id', null)->get() as $application){
           if($application->payment && $application->payment->status == 'success'){
            $application->programme()->allocateThisParticipant($application);
           }
       }
    }
}
