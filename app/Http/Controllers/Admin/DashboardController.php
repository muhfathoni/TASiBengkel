<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function booking()
    {
        // $users = User::all();
        // return view('admin.booking')->with('users',$users);

        $booking = Booking::all();
        return view('admin.booking')->with('tb_booking',$booking);
    }
}
