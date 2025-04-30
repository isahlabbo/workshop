<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Coupon;

class GenerateCouponCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupon:code-generate';

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
        for($no = 1; $no<=40; $no++){
            $code = 'DCS/2025B/'.sprintf("%03d", $no);
            Coupon::create(['code'=>$code, 'percentage'=>100]);
        }

        for($no = 1; $no<=80; $no++){
            $code = 'CCS/2025B/'.sprintf("%03d", $no);
            Coupon::create(['code'=>$code, 'percentage'=>100]);
        }

        for($no = 1; $no<=40; $no++){
            $code = 'CCE/2025B/'.sprintf("%03d", $no);
            Coupon::create(['code'=>$code, 'percentage'=>100]);
        }
    }
}
