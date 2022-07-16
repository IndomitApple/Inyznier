<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        User::where('id',auth()->user()->id)->update($request->except('_token'));
        return redirect()->back()->with('message','Profil został zaktualizowany.');
    }

    public function profilePic(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if ($request->hasFile('file'))
        {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalName();
            $filePath = 'images/' . $name;

            $id=auth()->user()->id;
            $user = User::find($id);
            Storage::disk('s3')->delete($user->image);

            Storage::disk('s3')->put($filePath, file_get_contents($image));
            $user = User::where('id', auth()->user()->id)->update(['image' => $name]);
            return redirect()->back()->with('message', 'Twoje zdjęcie zostało zaktualizowane.');
        }
    }
}
