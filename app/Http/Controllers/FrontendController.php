<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;

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

    /*Free terms of chosen doctor in one day*/
    public function show($doctorId, $date)
    {
        $appointment = Appointment::where('user_id',$doctorId)->where('date',$date)->first();
        $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        $user = User::where('id',$doctorId)->first();
        return view('appointment',compact('times','date','user'));
    }

    /*Showing doctors who have free terms for visit in chosen day*/
    public function findDoctorsBasedOnDate($date)
    {
        $doctors = Appointment::where('date',$date)->get();
        return $doctors;
    }


}
