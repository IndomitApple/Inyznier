<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        //doctor can see only future appointments (from tomorrow day)
        $myappointments = Appointment::where('user_id',auth()->user()->id)->where('date', '>=', now())->get();
        return view('admin.appointment.index',compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            /*'date'=>'required|unique:appointments,date,NULL,id,user_id'.Auth::id(),*/
            'date' =>['required', Rule::unique('appointments')->where(function ($query) {
                return $query->where('user_id',Auth::id());
            })],
            'time'=>'required'
        ]);
        $appointment = Appointment::create
        ([
            'user_id' => auth()->user()->id,
            'date' => $request->date
        ]);
        foreach($request->time as $time)
        {
            Time::create
            ([
                'appointment_id'=>$appointment->id,
                'time'=>$time
            ]);
        }
        return redirect()->back()->with('message','Godziny wizyt zostały zapisane dla dnia: '.$request->date);
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
        //
    }

    /**
     * Check if the specified resource is in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        //Doctor can choose only future days
        $date = $request->date;
        $appointment = Appointment::where('date',$date)->where('date', '>=', now())->where('user_id',auth()->user()->id)->first();
        if(!$appointment)
        {
            return redirect()->to('/appointment')->with('errormessage','Wybrałeś złą datę lub w tym dniu nie ma żadnych terminów.');
        }
        $appointmentId = $appointment->id;
        $times = Time::where('appointment_id', $appointmentId)->get();
        return view('admin.appointment.index', compact('times','appointmentId','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function updateTime(Request $request)
    {
        $appointmentId = $request->appointmentId;
        $appointment = Time::where('appointment_id',$appointmentId)->delete();
        foreach($request->time as $time)
        {
            Time::create([
                'appointment_id'=>$appointmentId,
                'time'=>$time,
                'status'=>0
            ]);
        }
        return redirect()->route('appointment.index')->with('message','Zaktualizowano godziny przyjęć.');
    }

}
