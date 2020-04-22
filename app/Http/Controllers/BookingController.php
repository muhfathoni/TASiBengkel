<?php

namespace App\Http\Controllers;

use App\booking;
use Illuminate\Http\Request;
use Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::where('userid',Auth::user()->id)->get();


        $data['result'] = $booking ;

        // dd($booking);
        return view ('booking')->with ("booking", $booking);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $this->validate($request, [
            'namaBengkel'          => 'required',
            'namaService'          => 'required',
            'jadwalService'        => 'required', 
            'jamService'           => 'required'
        ]);

        $booking = new Booking();

        $booking->userid = Auth::user()->id;
        $booking->nama = $request->namaBengkel;
        $booking->jenis_service = $request->namaService;
        $booking->jadwal = $request->jadwalService;
        $booking->jam = $request->jamService;

        $booking->save();

        return redirect()->route('booking')->with('success', 'Booking berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(booking $booking)
    {
        //
    }
}
