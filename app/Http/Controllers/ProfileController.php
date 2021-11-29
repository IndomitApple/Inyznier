<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'gender'=>'required',
        ]);
        User::where('id',auth()->user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone_number'=>$request->phone_number,
            'gender'=>$request->gender,
            'description'=>$request->description,
        ]);
        return redirect()->back()->with('message','Profil został zaktualizowany.');
    }
}
