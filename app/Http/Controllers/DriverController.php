<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Driver;
use App\Models\Color;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DriverController extends Controller
{
    function register_get()
    {
        $cities=City::all();
        $colors=Color::all();
       return view("register")->with([
           "cities"=>$cities,
           "colors"=>$colors
       ]);
    }
    function register_post(Request $request)
    {
      $this->validate($request,[
       
          'name'=>'required|max:120',
          'password'=>'required|min:8',
          'password2'=>'required|same:password',
      ]);
      $new_driver=new Driver();
      $new_driver->name=$request["name"];
      $new_driver->family=$request["family"];
      $new_driver->number=$request["number"];
      $new_driver->city_id=$request["city"];
      $new_driver->car=$request["car"];
      $new_driver->pelak=$request["pelak"];
      $new_driver->color_id=$request["color"];
      $new_driver->address=$request["address"];
      $new_driver->password=bcrypt($request["password"]);
      
      $new_driver->save();

     return redirect("/");


    }
    
    function login_get()
    {
       return view("login");
    }

    function login_post(Request $request)
    {
        $this->validate($request,[
            'number'=>'required',
            'password'=>'required'
    
        ]);
       
        if(Auth::attempt(["number"=>$request["number"],"password"=>$request["password"]])){
            return redirect("/driver_profile")->with([
                "message"=>"شما با موفقیت وارد حساب کاربری خود شدید"
            ]
            );
        }
        else{
            return redirect("/login")->with([
                "message"=>"شماره تلفن یا گذرواژه به درستی وارد نشده است"
            ]

            );
        }


      
    }
    function trips_get(){
        $trips=Trip::all();
        return view("driver_profile")->with([
            "trips"=>$trips
        ]);
        
    }
}
