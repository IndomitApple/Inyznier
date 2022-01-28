<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\StartVideoChat;
use App\Models\User;

class VideoChatController extends Controller
{

    public function index($date,$doctorId,$userId)
    {
        $doctor_id = $doctorId;
        $user_id = $userId;
        $users = User::where('id', '<>', Auth::id())->where('id',$doctorId)->orWhere('id', '<>', Auth::id())->where('id',$userId)->get();
        return view('video-chat',compact('date','doctor_id','user_id','users'));
    }
    public function callUser(Request $request)
    {
        $data['userToCall'] = $request->user_to_call;
        $data['signalData'] = $request->signal_data;
        $data['from'] = Auth::id();
        $data['type'] = 'incomingCall';

        broadcast(new StartVideoChat($data))->toOthers();
    }
    public function acceptCall(Request $request)
    {
        $data['signal'] = $request->signal;
        $data['to'] = $request->to;
        $data['type'] = 'callAccepted';
        broadcast(new StartVideoChat($data))->toOthers();
    }
}
