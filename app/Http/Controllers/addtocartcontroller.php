<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addtocart;
use Auth;

class addtocartcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //eager loading
        $carts = addtocart::with('user', 'produk')->where('user_id',Auth::user()->id)->get();


        //membuat api
        // $data['title'] = 'API cart';
        // $data['result'] = $cart;

        $notif = addtocart::where('user_id', Auth::user()->id)->get();
        return view ('cart', compact('notif', 'carts'));

        // return view ('cart')->with ("carts", $carts);
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
        //
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
        $carts = addtocart::with('tb_cart')->where('produk_id', $id)->where('user_id',Auth::user()->id)->delete();
        return redirect('/viewcart')->with('status', 'Data Berhasil DiHapus');
    }

    public function getNotification(){
        $cart = addtocart::all();

        return $cart;
    }
}
