<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\Booking;

class FrontendController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Europe/Warsaw');
        if(request('date'))
        {
            $doctors = $this->findDoctorsBasedOnDate(request('date'));
            return view('welcome',compact('doctors'));
        }
        $doctors = Appointment::where('date',date('d-m-Y'))->get();
        return view('welcome',compact('doctors'));
    }

    /*Show free terms of chosen doctor in one day*/
    public function show($doctorId, $date)
    {
        $appointment = Appointment::where('user_id',$doctorId)->where('date',$date)->first();
        $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        $user = User::where('id',$doctorId)->first();
        $doctor_id = $doctorId;
        return view('appointment',compact('times','date','user','doctor_id'));
    }

    /*Showing doctors who have free terms for visit in chosen day*/
    public function findDoctorsBasedOnDate($date)
    {
        $doctors = Appointment::where('date',$date)->get();
        return $doctors;
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Europe/Warsaw');
        $request->validate(['time'=>'required']);
        /*If patient took an appointment this day, he get error message*/
        $check = $this->checkBookingTimeInterval();
        if($check)
        {
            return redirect()->back()->with('errormessage','Zarezerwowałeś już dzisiaj wizytę. Poczekaj proszę do następnego dnia, aby móc zarezerować kolejną.');
        }

        /*Reservation created in database*/
        Booking::create
        ([
            'user_id'=>auth()->user()->id,
            'doctor_id'=>$request->doctorId,
            'time'=>$request->time,
            'date'=> $request->date,
            'status'=>0
        ]);

        /*If the appointment is reserved, it is not available for users to reserve*/
        Time::where('appointment_id',$request->appointmentId)->where('time',$request->time)->update(['status'=>1]);

        return redirect()->back()->with('message','Zarezerwowałeś wizytę.');
    }

    /*Checks if the patient took an appointment today - he needs to wait for the next day to take another*/
    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id','desc')
                ->where('user_id',auth()->user()->id)
                ->whereDate('created_at',date('Y-m-d'))
                ->exists();
    }

}
