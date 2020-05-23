<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\transaksi;
use Carbon\Carbon;
use App\transaksibarang;
use App\addtocart;
use Auth;

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
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function() {
            
		    \Midtrans\Config::$serverKey = 'SB-Mid-server-Qby1yETeqZXvWCVrvsOEE9pH';
		    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            
            $transaksi = transaksi::where('status','pending')->get();
            foreach ($transaksi as $t) {
                $duration_since_order = $t->created_at->diffInMinutes(Carbon::now());
                if ($duration_since_order <= 60) {
                    $order_status_obj = \Midtrans\Transaction::status($t->id);
                    $status = $order_status_obj->transaction_status;
                    
                    //Update order status & save to database
                    transaksi::where('id',$t->id)->update(['status' => $status]);

                    if ($status == 'settlement' || $status == 'capture') {
                        $transaksibarang = transaksibarang::where('id_order',$t->id)->get();
                        foreach ($transaksibarang as $key => $val) {
                            $barang = produk::where('id',$val->id_barang)->decrement('stock',1);
                            dd($barang);
                            $addtocart = addtocart::where('user_id',$t->id_user)->where('produk_id',$val->id_barang)->delete();
                        }
                    }
                } else {
                    $transaksi::where('id',$t->id)->update(['status' => 'expired']);
                }
            }
        })->everyFifteenMinutes()->timezone('Asia/Jakarta');
    }

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
}
