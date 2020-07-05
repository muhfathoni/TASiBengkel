<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use App\addtocart;
use Auth;
use Illuminate\Database\QueryException; 

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        if($Request->f == null){
            $produk = produk::all();
        }
        else{
            $produk=produk::where('jenis_id', $Request->f)->get();
        }
        //print dari tb_produk
        
        $notif = addtocart::where('user_id', Auth::user()->id)->get();

        // dd($booking);
        // return view ('booking')->with ("booking", $booking)->with ('bengkels', $bengkels);

        //membuat api
        $data['title'] = 'API produk';
        $data['result'] = $produk;

        // dd($produk);
        // return view ('produk')->with ("produk", $produk);
        return view ('produk', compact('notif', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = produk::where('id', $id)->get();

        return view ('produkdetail')->with ("produk", $produk);
        // return $produk;


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addtocart($id){

        // $id = Auth::user()->id;

        // dd($id);

        if(Auth::check()){

           $addtocart = new addtocart();

           $addtocart->user_id = Auth::user()->id;
           $addtocart->produk_id = $id;

           try {

             $addtocart->save();

         } catch (QueryException $e) {
            return 0;
        }


        return 1;

    }

    else {
        return 2;
    }

}
}
