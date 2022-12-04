<?php

namespace App\Console;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DB::table('orders')->where('date', date("Y-m-d") )->update(['status' => 'Onprogress']);
            DB::table('orders')->where('finaldate', date("Y-m-d"))->update(['status' => 'Finished']);
            $temp=DB::table('orders')->where('finaldate', date("Y-m-d"))->get();
            foreach($temp as $changestatus){
               $homestay_id = $changestatus->homestay_id;
               DB::table('houses')->where('id',$homestay_id)->update(['status'=>'Tersedia']); 
            }
        })->everyMinute();;
    }
}
