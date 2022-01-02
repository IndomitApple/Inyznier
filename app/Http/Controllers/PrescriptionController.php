<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Warsaw');
        $bookings = Booking::where('date',date('Y-m-d'))->where('status',0)->get();
        return view('prescription.index',compact('bookings'));

    }
}
