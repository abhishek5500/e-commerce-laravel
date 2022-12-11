<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userdetail;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userprofile()
    {
        return view('frontend.pages.profile');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'string', 'max:6'],
            'address' => ['required', 'string', 'max:255'],
    
          
        ]);
        
        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->name,
        ]);

        $user->userDetails()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [ 
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->phone,
            'pincode' => $request->pincode,
            'address' => $request->address,
            ]
        );
        return redirect()->to('/');
  
    }
    public function passwordcreate()
    {
        return view('frontend.pages.changepass');
    }
    public function changepass(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }
}
