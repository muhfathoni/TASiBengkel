<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Booking;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Bikin daftar bulan (Jan s/d Dec)
    public function daftarBulan()
    {
        $bulan = [];
        foreach (range(1,12) as $bulan_numerik) {
            $dateObject = \DateTime::createFromFormat('!m', $bulan_numerik);
            $bulan[] = $dateObject->format('F');
        }

        return $bulan;
    }

    public function daftarTahun($isAdmin = false)
    {
        $tahun = [];
        
        if ($isAdmin) {
            $booking__paling_awal = Booking::where('id_bengkel',Auth::user()->id)->orderBy('jadwal')->pluck('jadwal');
        } else {
            $booking__paling_awal = Booking::orderBy('jadwal')->pluck('jadwal');
        }
        
        $awal = Carbon::parse($booking__paling_awal->first())->format('Y');
        $akhir = Carbon::parse($booking__paling_awal->last())->format('Y');

        for ($i = $awal; $i <= $akhir; $i++) {
            $tahun[] = strval($i);
        }

        return $tahun;
    }

    public function index()
    {
        if (Auth::user()->usertype == 'admin') {
            $tahunArray = $this->daftarTahun(true);
            $jumlah_customer = Booking::where('id_bengkel',Auth::user()->id)->distinct('userid')->count();
            $total_booking = Booking::where('id_bengkel',Auth::user()->id)->count();
        } else {
            $tahunArray = $this->daftarTahun();
            $jumlah_customer = Booking::distinct('userid')->count();
            $total_booking = Booking::count();

        }
        
       
        
        return view('admin.dashboard')->with('tahun',$tahunArray)->with('cust',$jumlah_customer)->with('booking',$total_booking);
    }


    public function booking()
    {
        // $users = User::all();
        // return view('admin.booking')->with('users',$users);
        if (Auth::user()->usertype == 'admin') {
            $booking = Booking::with('namaservis', 'namabengkel')->where('id_bengkel',Auth::user()->id)->get();
        } else {
            $booking = Booking::all();

        }
        return view('admin.booking')->with('tb_booking',$booking);
    }

    public function chart($year=null)
    {
        $data = [];
        $index = 1;

        if ($year == null) {
            $data[0] = ['Semua','Booking'];

            if (Auth::user()->usertype == 'admin') {
                $daftar_tahun = $this->daftarTahun(true);

                $booking_per_tahun = Booking::where('id_bengkel',Auth::user()->id)->orderBy('jadwal')->get()
                                        ->groupBy(function($booking_item){
                                            return Carbon::parse($booking_item->jadwal)->format('Y');
                                        })->toArray();
            } else {
                $daftar_tahun = $this->daftarTahun();

            $booking_per_tahun = Booking::orderBy('jadwal')->get()
                                    ->groupBy(function($booking_item){
                                        return Carbon::parse($booking_item->jadwal)->format('Y');
                                    })->toArray();
            }
           
            
            foreach ($daftar_tahun as $key => $tahun) {
                $data[$index++] = [ $tahun, (array_key_exists($tahun,$booking_per_tahun)) ? sizeof($booking_per_tahun[$tahun]) : 0 ];
            }

        } else {
            $data[0] = [$year,'Booking'];
            $daftar_bulan = $this->daftarBulan();

            if(Auth::user()->usertype == 'admin'){
                $booking_per_bulan = Booking::where('id_bengkel',Auth::user()->id)->whereYear('jadwal',$year)->orderBy('jadwal')->get()
                                    ->groupBy(function($booking_item){
                                        return Carbon::parse($booking_item->jadwal)->format('F');
                                    })->toArray();
            }
            else{
                $booking_per_bulan = Booking::whereYear('jadwal',$year)->orderBy('jadwal')->get()
                ->groupBy(function($booking_item){
                    return Carbon::parse($booking_item->jadwal)->format('F');
                })->toArray();
            }
            
            
            foreach ($daftar_bulan as $key => $bulan) {
                $data[$index++] = [ $bulan, (array_key_exists($bulan,$booking_per_bulan)) ? sizeof($booking_per_bulan[$bulan]) : 0];
            }

        }

        return $data;
    }

        public function income(Request $request)
        { 
            $income = Booking::where('id',$request->id_booking)->update(['revenue' => $request->revenue]); 
            
            return true;
         }


         public function revenue()
    {
        if (Auth::user()->usertype == 'admin') {
            $tahunArray = $this->daftarTahun(true);
            $total_pendapatan = Booking::where('id_bengkel',Auth::user()->id)->sum('revenue');
            
            } 
        else {
            $tahunArray = $this->daftarTahun();
            $total_pendapatan = Booking::sum('revenue');
            
        }

        return view('admin.revenue')->with('tahun',$tahunArray)->with('total_pendapatan',$total_pendapatan);
    }

    public function chartrevenue ($year=null)
    {
        $data = [];
        $index = 1;

        if ($year == null) {
            $data[0] = ['Semua','Pendapatan'];

            if (Auth::user()->usertype == 'admin') {
                $daftar_tahun = $this->daftarTahun(true);

                $pendapatan_per_tahun = Booking::where('id_bengkel',Auth::user()->id)->orderBy('jadwal')->get()
                                        ->groupBy(function($booking_item){
                                            return Carbon::parse($booking_item->jadwal)->format('Y');
                                        })->toArray();
            } else {
                $daftar_tahun = $this->daftarTahun();

            $pendapatan_per_tahun = Booking::orderBy('jadwal')->get()
                                    ->groupBy(function($booking_item){
                                        return Carbon::parse($booking_item->jadwal)->format('Y');
                                    })->toArray();
            }
           
            
            foreach ($daftar_tahun as $key => $tahun) {
                $pendapatan = 0;
                if(array_key_exists($tahun,$pendapatan_per_tahun)){
                    foreach ($pendapatan_per_tahun[$tahun] as $k=>$v){
                        $pendapatan += $v['revenue'];
                    } 
                }
                $data[$index++] = [ $tahun, $pendapatan];
            }

        } else {
            $data[0] = [$year,'Pendapatan'];
            $daftar_bulan = $this->daftarBulan();

            if(Auth::user()->usertype == 'admin'){
                $pendapatan_per_bulan = Booking::where('id_bengkel',Auth::user()->id)->whereYear('jadwal',$year)->orderBy('jadwal')->get()
                                    ->groupBy(function($booking_item){
                                        return Carbon::parse($booking_item->jadwal)->format('F');
                                    })->toArray();
            }
            else{
                $pendapatan_per_bulan = Booking::whereYear('jadwal',$year)->orderBy('jadwal')->get()
                ->groupBy(function($booking_item){
                    return Carbon::parse($booking_item->jadwal)->format('F');
                })->toArray();
            }
            
            
            foreach ($daftar_bulan as $key => $bulan) {
                $pendapatan = 0;
                if(array_key_exists($bulan,$pendapatan_per_bulan)){
                    foreach ($pendapatan_per_bulan[$bulan] as $k=>$v){
                        $pendapatan += $v['revenue'];
                    } 
                }
                $data[$index++] = [ $bulan, $pendapatan];
            }

        }

        return $data;
    }

    public function inputitem(){

        return view('admin.input');
    }









}
