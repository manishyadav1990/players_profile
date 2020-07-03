<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return view('index', compact('players'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name'            => 'required',
            'dob'             =>  'required',
            'profile'         => 'required|image|nullable|max:1999',
            'mobile'          => 'required|max:10',
            'email'            => 'required|email',
            'gender'           => 'required',
            'playing_role'     => 'required',
            'batting_style'    => 'required',
            'bowling_style'    => 'required',
            'career_info' => 'required'
        ]);

            // Handle File Upload
            if($request->hasFile('profile')){
                // Get filename with extension
                $filenameWithExt = $request->file('profile')->getClientOriginalName();
                // Get just filename 
                $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                //Get just ext
                $extension = $request->file('profile')->getClientOriginalExtension(); 
                //Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload Image 
                $path = $request->file('profile')->storeAs('public/cover_images',$fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }

            $storeData = new Player;
            $storeData->name = $request->input('name');
            $storeData->dob = $request->input('dob');
            $storeData->mobile = $request->input('mobile');
            $storeData->email = $request->input('email');
            $storeData->gender = $request->input('gender');
            $storeData->playing_role = $request->input('playing_role');
            $storeData->batting_style = $request->input('batting_style');
            $storeData->bowling_style = $request->input('bowling_style');
            $storeData->career_info = $request->input('career_info');
            $storeData->profile = $fileNameToStore;
            $player= $storeData->save();

    if(!is_null($player)) {
        return redirect('/players')->with('completed', 'Profile has been saved!');
    }
    else {
        return back()->with('error', 'Whoops! some error encountered. Please try again.');
    }

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
        $player = Player::findOrFail($id);
        return view('edit', compact('player'));
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
        $request->validate([
            'name'            => 'required',
            'dob'             =>  'required',
            'profile'         => 'required|image|nullable|max:1999',
            'mobile'          => 'required|max:10',
            'email'            => 'required|email',
            'gender'           => 'required',
            'playing_role'     => 'required',
            'batting_style'    => 'required',
            'bowling_style'    => 'required',
            'career_info' => 'required'
        ]);

       // Handle File Upload
       if($request->hasFile('profile')){
        // Get filename with extension
        $filenameWithExt = $request->file('profile')->getClientOriginalName();
        // Get just filename 
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('profile')->getClientOriginalExtension(); 
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload Image 
        $path = $request->file('profile')->storeAs('public/cover_images',$fileNameToStore);
    }

            $updateData = Player::find($id);
            $updateData->name = $request->input('name');
            $updateData->dob = $request->input('dob');
            $updateData->mobile = $request->input('mobile');
            $updateData->email = $request->input('email');
            $updateData->gender = $request->input('gender');
            $updateData->playing_role = $request->input('playing_role');
            $updateData->batting_style = $request->input('batting_style');
            $updateData->bowling_style = $request->input('bowling_style');
            $updateData->career_info = $request->input('career_info');
            if($request->hasFile('profile')){
                $updateData->profile = $fileNameToStore;
            }
            $updateData->save();

        return redirect('/players')->with('completed', 'Profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();
        return redirect('/players')->with('completed', 'Profile has been deleted');
    }
}
