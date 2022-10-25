<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Trip;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    function register_get()
    {
        $cities=City::all();
       return view("register_passenger")->with([
           "cities"=>$cities
       ]);
    }
    function register_post(Request $request)
    {
      $this->validate($request,[
       
          'name'=>'required|max:120',
          'password'=>'required|min:8',
          'password2'=>'required|same:password',
      ]);
      $new_user=new User();
      $new_user->name=$request["name"];      
      $new_user->family=$request["family"];
      $new_user->number=$request["number"];
      $new_user->email=$request["email"];
      $new_user->city_id=$request["city"];
     
      $new_user->address=$request["address"];
      $new_user->password=bcrypt($request["password"]);
      
      $new_user->save();

     return redirect("/");


    }
    
    function login_get()
    {
       return view("login_passenger");
    }

    function login_post(Request $request)
    {
        $this->validate($request,[
            'login'=>'required',
            'password'=>'required'
    
        ]);
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) ? 'email' : 'number';
        $request->merge([ $login_type => $request->input('login') ]);
        if (Auth::attempt($request->only($login_type, 'password'))) { 
           // if(Auth::attempt(['role'=>0])){
               
            $id = Auth::id();
              
              Session::put("user_id",$id);
        
              return redirect("/taxi");
        }
        else{
            return redirect("/login")->with([
                "message"=>"شماره تلفن یا گذرواژه به درستی وارد نشده است"
            ]

            );
        }


      
    }
    function taxi()
    {
        return view("taxi");
    }
    function taxi_request(Request $request)
    {
    
    $new_trip=new Trip();
    $new_trip->user_id = Auth::id();
    $new_trip->lat_start=$request["lat-start"];
    $new_trip->lng_start=$request["lng-start"];
    $new_trip->lat_end=$request["lat-end"];
    $new_trip->lng_end=$request["lng-end"];
    $new_trip->price=$request["price"];
    $new_trip->save();
    }
}
