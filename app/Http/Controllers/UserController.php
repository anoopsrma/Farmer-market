<?php

namespace App\Http\Controllers;


use Auth;
use Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile()
    {
    	return view('/profile/myaccount',array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('/profile/myaccount', array('user' => Auth::user()) );
    }

    public function update_account(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|max:120',
            'city' => 'required|max:120',
            'district' => 'required|max:120',
            'phone' => 'required|max:10',

        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->city = $request['city'];
        $user->district = $request['district'];
        $user->phone = $request['phone'];

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['name' => $user->name]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['email' => $user->email]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['city' => $user->city]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['district' => $user->district]);
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['phone' => $user->phone]);
        return redirect('/profile/myaccount')->with('status', 'Account updated');
    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('profile.myorders',['orders' => $orders]);
    }
}
