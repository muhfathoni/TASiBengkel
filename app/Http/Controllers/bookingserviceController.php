<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\servis;
use App\Booking;
use App\addtocart;

class bookingserviceController extends Controller
{
  public function index()
  {
                // $booking = Booking::where('userid',Auth::user()->id)->get();
    $bengkels = User::where('usertype', 'admin')->get();

                // $data['result'] = $booking ;

                // dd($booking);

    $notif = addtocart::where('user_id', Auth::user()->id)->get();
    return view ('bookingservice', compact('notif', 'bengkels'));
    // return view ('bookingservice')->with ('bengkels', $bengkels);
  }

  public function namaservis($id){
    $servis = servis::where('id_bengkel', $id)->get();

    $html = '';

    foreach ($servis as $row){
      $html .='<option value="'.$row->id.'">'.$row->nama_servis. '</option>';
    }

    return $html;
  }

  public function store(Request $request)
  {

    $this->validate($request, [
      'jadwalService'        => 'required', 
      'jamService'           => 'required'
    ]);

    $booking = new Booking();

    $booking->userid = Auth::user()->id;
    $booking->id_bengkel = $request->bengkel;
    $booking->jenis_service = $request->namaService;
    $booking->jadwal = $request->jadwalService;
    $booking->jam = $request->jamService;

    $booking->save();

    return redirect()->route('booking');
  }
}
