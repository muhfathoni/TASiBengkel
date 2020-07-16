<?php

namespace App\Http\Controllers;

use App\booking;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\servis;
use App\addtocart;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $booking = Booking::where('userid',Auth::user()->id)->get();
        $bengkels = User::where('usertype', 'admin')->get();

        $notif = addtocart::where('user_id', Auth::user()->id)->get();


        $data['result'] = $booking ;

        // dd($booking);
        // return view ('booking')->with ("booking", $booking)->with ('bengkels', $bengkels);
        return view ('booking', compact('notif', 'booking', 'bengkels'));
    }

    public function pembayaran(Request $request, $id){

        $filename = $request->file('buktipembayaran')->storeAs('img_bukti', Carbon::now()->timestamp.'.'.$request->file('buktipembayaran')->extension());

        // dd($filename)

        $namafoto = '/storage/'. $filename;
        // $namafoto = $filename;

        $buktipembayaran = Booking::where('id',$request->id)->update(['bukti_pembayaran' => $namafoto]); 

        return redirect('booking')->with('success');
        

    }


    public function store(Request $request){

      $booking = new Booking();

      $booking->userid = Auth::user()->id;
      $booking->id_bengkel = $request->bengkel;
      $booking->jenis_service = $request->namaService;
      $booking->jadwal = $request->jadwalService;
      $booking->jam = $request->jamService;

      $booking->save();

      return redirect()->route('bookingservice')->with('success', 'Booking berhasil');
  }


  public function destroy($id){
    $booking = Booking::with('tb_booking')->where('id',$id)->delete();
    return redirect('/booking')->with('status', 'Data Berhasil DiHapus');
}

public function namaservis($id){
    $servis = servis::where('id_bengkel', $id)->get();

    $html = '';


    foreach ($servis as $row){
        $html .='<option value="'.$row->id.'">'.$row->nama_servis. '</option>';
    }

    return $html;
}

public function getHargaService($id) {
    $servis = servis::where('id', $id)->get();
    $harga = '';

    foreach ($servis as $row) {
        $harga .= 'Rp.'.$row->harga;
    }


    return $harga;
}
}
