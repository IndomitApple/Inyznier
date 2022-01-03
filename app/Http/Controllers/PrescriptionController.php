<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Warsaw');
        $bookings = Booking::where('date',date('Y-m-d'))->where('status',0)->where('doctor_id',auth()->user()->id)->get();
        return view('prescription.index',compact('bookings'));

    }

    public function store(Request $request){
        $data = $request->all();
        $data['medicine']=implode(',', $request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message','Dodano receptę i zalecenia.');
    }
}
