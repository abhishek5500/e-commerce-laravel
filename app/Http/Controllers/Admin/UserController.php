<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function index()
   {
    $users = User::paginate(10);
    return view('admin.users.index', compact('users'));
   }
   public function create()
   {
    // $users = User::paginate(10);
    return view('admin.users.create');
   }
   public function store(Request $request)
   {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as,
        ]);
     
    return redirect()->to('/admin/users');
   }
   public function edit(int $userid)
   {
        $user = User::where('id', $userid)->first();
        return view('admin.users.edit', compact('user'));
   }
   public function update(Request $request,int $userid)
   {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],

        'password' => ['required', 'string', 'min:8'],
        'role_as' => ['required', 'integer'],
    ]);
    User::findOrFail($userid)->update([
        'name' => $request->name,

        'password' => Hash::make($request->password),
        'role_as' => $request->role_as,
    ]);
 
        return redirect()->to('/admin/users');
   }
   public function delete(int $userid)
   {

    User::findOrFail($userid)->delete();
 
        return redirect()->to('/admin/users');
   }
}
