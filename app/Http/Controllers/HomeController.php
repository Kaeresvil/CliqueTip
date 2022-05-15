<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Update Profile
    public function updateProfile(Request $request)
    {
        if($request->description == null)
        {
            $request->description = Auth::user()->description;
        }

        $user = User::find(Auth::user()->id);

        if($request->hasfile('profilePicture'))
        {
            $dest = 'uploads/'.$user->prof_image;
            if(File::exists($dest))
            {
                File::delete($dest);
            }
            $file = $request->file('profilePicture');
            $extension = $file->getClientOriginalExtension();
            $filename = $user->email.'.'.$extension;
            $file->move('uploads/user/', $filename);
            $user->prof_image = $filename;
        }
        $user->update();

        User::where('id', Auth::user()->id)
        ->update([
                    'name' => $request->name, 
                    'description' => $request->description, 
                ]);

        return back();
    }
}
