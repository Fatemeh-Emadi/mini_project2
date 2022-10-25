<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Trip;
class StatusController extends Controller
{  
    function reject(Request $request){
  
    $new_status=new Status();
    $new_status->trip_id=$request["trip_id"];
    $new_status->reject=1;
    $new_status->accept=0;
    $new_status->save();
    

    }
    function accept(Request $request){
  
        $new_status=new Status();
        $new_status->trip_id=$request["trip_id"];
        $new_status->reject=0;
        $new_status->accept=1;
        $new_status->save();
        
    
        }
}
