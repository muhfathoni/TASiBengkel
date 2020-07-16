<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Booking;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\produk;
use Illuminate\Http\Request;
use App\jenis;
use App\inputmitra;
use App\Notifications\notif;
use App\addtocart;
use App\pembelianbarang;
use App\alamat;

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
            $tahunArray = $this->daftarTahun(true);
            $total_pendapatan = Booking::where('id_bengkel',Auth::user()->id)->sum('revenue') ;

            return view('admin.dashboard')->with('tahun',$tahunArray)->with('cust',$jumlah_customer)->with('booking',$total_booking)->with('total_pendapatan',$total_pendapatan);

        } else {
            $tahunArray = $this->daftarTahun();
            $jumlah_customer = Booking::distinct('userid')->count();
            $total_booking = Booking::count();
            $tahunArray = $this->daftarTahun();
            $total_pendapatan = Booking::sum('revenue') * 0.05;  
            $stockbarang = produk::distinct('id')->count();
            $jumlahpendapatan = Booking::sum('revenue');
            $jumlahmitra = inputmitra::count('nama');

            return view('admin.dashboard')->with('tahun',$tahunArray)->with('cust',$jumlah_customer)->with('booking',$total_booking)->with('total_pendapatan',$total_pendapatan)->with('stockbarang',$stockbarang)->with('jumlahpendapatan',$jumlahpendapatan)->with('jumlahmitra',$jumlahmitra);
        }
               
        
        
        // errornya disini nes, gue bingung kalo ini ditaro direturn view atas vespuci atau vsd error, kalo gue pisahin return view baru, yang error superadminnya. Blade nya udah gue comment in nes di dashboard.blade
        // ->with('stockbarang',$stockbarang)->with('jumlahpendapatan',$jumlahpendapatan)->with('jumlahmitra',$jumlahmitra);
        
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

        // dd($booking);

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
            $booking = Booking::where('id',$request->id_booking)->first();
            $user = User::where('id', Auth::user()->id)->orWhere('usertype', 'superadmin')->get();

            Notification::send($user, new notif($booking));
            
            return true;
         }


         public function revenue()
    {
        if (Auth::user()->usertype == 'admin') {
            $tahunArray = $this->daftarTahun(true);
            $total_pendapatan = Booking::where('id_bengkel',Auth::user()->id)->sum('revenue') ;
            
            } 
        else {
            $tahunArray = $this->daftarTahun();
            $total_pendapatan = Booking::sum('revenue') * 0.05;
            
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
                $daftar_tahun = $this->daftarTahun();

            $pendapatan_per_tahun = Booking::orderBy('jadwal')->get()
                                    ->groupBy(function($booking_item){
                                        return Carbon::parse($booking_item->jadwal)->format('Y');
                                    })->toArray();

                                    foreach ($daftar_tahun as $key => $tahun) {
                                        $pendapatan = 0;
                                        if(array_key_exists($tahun,$pendapatan_per_tahun)){
                                            foreach ($pendapatan_per_tahun[$tahun] as $k=>$v){
                                                $pendapatan += $v['revenue'] * 0.05;
                                            } 
                                        }
                                        $data[$index++] = [ $tahun, $pendapatan];
                                    }
            }
           

        } else {
            $data[0] = [$year,'Pendapatan'];
            $daftar_bulan = $this->daftarBulan();

            if(Auth::user()->usertype == 'admin'){
                $pendapatan_per_bulan = Booking::where('id_bengkel',Auth::user()->id)->whereYear('jadwal',$year)->orderBy('jadwal')->get()
                                    ->groupBy(function($booking_item){
                                        return Carbon::parse($booking_item->jadwal)->format('F');
                                    })->toArray();

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
            else{
                $pendapatan_per_bulan = Booking::whereYear('jadwal',$year)->orderBy('jadwal')->get()
                ->groupBy(function($booking_item){
                    return Carbon::parse($booking_item->jadwal)->format('F');
                })->toArray();

                foreach ($daftar_bulan as $key => $bulan) {
                    $pendapatan = 0;
                    if(array_key_exists($bulan,$pendapatan_per_bulan)){
                        foreach ($pendapatan_per_bulan[$bulan] as $k=>$v){
                            $pendapatan += $v['revenue'] * 0.05;
                        } 
                    }
                    $data[$index++] = [ $bulan, $pendapatan];
                }
            }
            
        }

        return $data;
    }

    public function inputbarang(){

        $jenis = jenis::all();
        $products = produk::all();
        
        
        return view('admin.input')->with('jenis', $jenis)->with('products', $products);
    }

    public function tambahbarang(Request $request){

        $filename = $request->file('gambar')->storeAs('img_produk', Carbon::now()->timestamp.'.'.$request->file('gambar')->extension());
        $tambahbarang = new produk;

        $tambahbarang->nama = $request->input('nama');
        $tambahbarang->deskrip = $request->input('deskripsi');
        $tambahbarang->stock = $request->input('stock');
        $tambahbarang->harga = $request->input('harga');    
        $tambahbarang->jenis_id = $request->input('jenisbarang');
        $tambahbarang->gambar_b = '/storage/'. $filename;
        $tambahbarang->save();
       
        return redirect('inputbarang')->with('success');
    }

    public function deletebarang($id){

        produk::destroy($id);

        return redirect()->back();
    }

    public function edit($id)
    {
        $editbarang = produk::find($id);
        $jenis = jenis::all();

        return view('admin.edit')->with('editbarang', $editbarang)->with('jenis', $jenis);
        
    }

    public function editbarang(Request $request, $id){

       
        $tambahbarang = produk::find($id);

        $tambahbarang->nama = $request->input('nama');
        $tambahbarang->deskrip = $request->input('deskripsi');
        $tambahbarang->stock = $request->input('stock');
        $tambahbarang->harga = $request->input('harga');    
        $tambahbarang->jenis_id = $request->input('jenisbarang');
        if ($request->has('gambar') && $request->file('gambar')->isValid()) {

            $filename = $request->file('gambar')->storeAs('img_produk', Carbon::now()->timestamp.'.'.$request->file('gambar')->extension());
            $tambahbarang->gambar_b = '/storage/'. $filename;
        }

        $tambahbarang->save();
       
        return redirect('inputbarang')->with('success');
    }

    public function inputmitra(){

        $inputmitra = inputmitra::all();
        
        
        return view('admin.inputmitra')->with('inputmitra', $inputmitra);
    }

    public function tambahmitra(Request $request){

        $filename = $request->file('gambar')->storeAs('img_mitra', Carbon::now()->timestamp.'.'.$request->file('gambar')->extension());
        $tambahmitra = new inputmitra;

        $tambahmitra->nama = $request->input('nama');
        $tambahmitra->deskripsi = $request->input('deskripsi');
        $tambahmitra->gambar = '/storage/'. $filename;
        $tambahmitra->save();
       
        return redirect('inputmitra')->with('success');
    }

    public function deletemitra($id){

        inputmitra::destroy($id);

        return redirect()->back();
    }

    public function editmitra($id)
    {
        $editmitra = inputmitra::find($id);

        return view('admin.editmitra')->with('editmitra', $editmitra);
        
    }

    public function editmitrasibengkel(Request $request, $id){

       
        $tambahmitra = inputmitra::find($id);

        $tambahmitra->nama = $request->input('nama');
        $tambahmitra->deskripsi = $request->input('deskripsi');
        if ($request->has('gambar') && $request->file('gambar')->isValid()) {

            $filename = $request->file('gambar')->storeAs('img_mitra', Carbon::now()->timestamp.'.'.$request->file('gambar')->extension());
            $tambahmitra->gambar = '/storage/'. $filename;
        }

        $tambahmitra->save();
       
        return redirect('inputmitra')->with('success');
    }
    
    public function markNotif()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return 0;
    }

    public function statusbarangadmin(){

        // $users = User::all();
        // $products = produk::all();
        // $cart = addtocart::all();
        
        $pembelianbarang = pembelianbarang::all();
        return view('admin.statusbarangadmin')->with('pembelianbarang', $pembelianbarang);
        
        // return view('admin.statusbarangadmin')->with('users', $users)->with('cart', $cart)->with('products', $products);
    }

    public function sucessOrder($id){
        $pembelian = pembelianbarang::findOrFail($id);

        try{
            $pembelian->status = "Success";
            $pembelian->update();
        }catch (Exception $exception){
            dd($exception);
        }

        return redirect()->route('statusbarangadmin');
    }

    public function alamatpengiriman()
    {
        $alamatpengiriman = alamat::all();

        return view('admin.customer')->with('alamatpengiriman', $alamatpengiriman);

        
    }
}
