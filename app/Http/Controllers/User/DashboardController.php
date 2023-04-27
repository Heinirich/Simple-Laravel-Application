<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
        
    /**
     * index
     *
     * @return \view
     */
    public function index(){
       
        $ch['title'] = 'Dashboard';
        $ch['meta_description'] = '';
        return view('user.dashboard.index',compact('ch'));
    }

    public function products(){
        $ch['title'] = 'Products';
        $ch['meta_description'] = '';
        return view('user.products.index',compact('ch'));
    }

    public function getSettings(){
        $ch['title'] = 'Settings';
        $ch['meta_description'] = '';
        return view('user.profile.settings',compact('ch'));
    }
    public function postSettings(Request $request){
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed succeslly'");
    }


}
