<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $pets = Pet::where('user_id', '=', $id)->get();
        return view('pet.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('pet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new Pet)->petAvatar($request);

        $data['image'] = $name;
        Pet::create
        ([
            'user_id'=>auth()->user()->id,
            'image'=>$request->image,
            'name'=>$request->name,
            'date_of_birth'=> $request->date_of_birth,
            'weight'=> $request->weight,
            'is_male'=> $request->is_male,
            'breed_id'=> $request->breed_id,

        ]);

        return redirect()->back()->with('message','Pomyślnie utworzono profil zwierzęcia.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $pet = Pet::find($id);
        return view('pet.delete', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = Pet::find($id);
        return view('pet.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $pet = Pet::find($id);
        $imageName = $pet->image;
        if($request->hasFile('image'))
        {
            $imageName = (new Pet)->petAvatar($request);
            Storage::disk('s3')->delete($pet->image);
        }
        $data['image'] = $imageName;

        $pet->update($data);
        return redirect()->route('pet.index')->with('message','Profil zwierzęcia został zaktualizowany.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pet = Pet::find($id);
        $petDelete = $pet->delete();
        if($petDelete)
        {
            Storage::disk('s3')->delete($pet->image);
        }
        return redirect()->route('pet.index')->with('message','Profil zwierzęcia został usunięty.');
    }

    public function validateStore($request)
    {
        return $this->validate($request,[
            'name'=>'required',
            'date_of_birth'=>'required',
            'is_male'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'breed_id'=>'required',
            'weight'=>'required'
        ]);
    }

    public function validateUpdate($request, $id)
    {
        return $this->validate($request,[
            'name'=>'required',
            'date_of_birth'=>'required',
            'is_male'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'breed_id'=>'required',
            'weight'=>'required'
        ]);
    }
}
