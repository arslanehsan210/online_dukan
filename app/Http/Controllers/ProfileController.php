<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{

    public function userid(){
        $user = Auth::user();
        return $user->id;
    } 


   public function show(User $user)
{
   $res = ['record' => User::find($this->userid())];
   return view('editprofile' , $res); 
}

public function update(Request $request)
{
    $res = User::find($this->userid());
    $res->name= $request->name;
    $res->phone= $request->phone;
    $res->mobile= $request->mobile;
    $res->address= $request->address;

    $res->save();

    return redirect('profile');
}


}
