<?php

namespace App\Console\Commands;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
// use Illuminate\Support\Facades\Log;
use App\Customer;
use App\Http\Controllers\CommonController;

class devChangeProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:devChangeProcess';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'device id changa DB Update';

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
     * @return mixed
     */
    public function handle()
    {

        $reqData = array(
            'GET_GAP' => urlencode(env('CHANGE_DEVID_GET_GAP')),
            'COMPANY_CD' => urlencode(env('COMPANY_CD'))
        );
        

        $CC = new CommonController();
        
        $customer = new Customer();

        $rtnValue = $CC->connectByPostNoStatus(env('GETCHANGEDEVIDLIST_URL'), $reqData);
        $rtnData = json_decode($rtnValue);

        if ($rtnData->{'status'} == "00") {
            $cList = json_decode(urldecode($rtnData->{'changeList'}));


            foreach($cList as $key => $value){
                $updData = [
                    'devid' =>  $value,
                    'updated_at' => Carbon::now(),
                ];
        
                $customer->updChgDevidCustomer($key, $updData);
            }
        }
        // Log::debug("command:".Carbon::now().">>::".json_encode($cList));
    }
}
