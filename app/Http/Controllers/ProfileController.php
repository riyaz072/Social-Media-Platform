<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.profile-page.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('frontend.profile-page.edit_profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'bio' => $request->bio,
            'privacy' => $request->privacy,
            // 'profile_picture' => $user->profile_picture,
        ]);
        
        if ($request->remove_dp == 1) {
            $user->profile_picture = null;
            $user->save();
        }
        if ($request->hasFile('profile_picture')) {
            $imagePath = uniqid() . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->file('profile_picture')->storeAs('image', $imagePath, 'public');
            $user->profile_picture = $imagePath; 
            $user->save();
        }
        return redirect()->route('profile.index')->with('Success','Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
