<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Bootcamp;
use App\Models\Workshop;

class UpdateFeeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'programme:update-fee';

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
        foreach(Bootcamp::all() as $bootcamp){
            $bootcamp->updateFees();
        }

        foreach(Workshop::all() as $workshop){
            $workshop->updateFees();
        }
    }
}
