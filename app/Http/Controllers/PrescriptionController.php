<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Europe/Warsaw');
        if($request->date)
        {
            $bookings = Booking::where('date',$request->date)->where('status',0)->where('doctor_id',auth()->user()->id)->get();
            return view('prescription.index', compact('bookings'));
        }
        $bookings = Booking::where('date',date('Y-m-d'))->where('status',0)->where('doctor_id',auth()->user()->id)->get();
        return view('prescription.index',compact('bookings'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['medicine']=implode(',', $request->medicine);
        Prescription::create($data);
        return redirect()->back()->with('message','Dodano receptę i zalecenia.');
    }

    public function show($userId,$date)
    {
        $prescription = Prescription::where('user_id',$userId)->where('date',$date)->first();
        return view('prescription.show',compact('prescription'));
    }

    public function patientsFromPrescription()
    {
        $patients = Prescription::get();
        return view('prescription.all',compact('patients'));
    }
}
