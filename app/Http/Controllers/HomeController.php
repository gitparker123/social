<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


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
     * @return \Illuminate\Http\  
     */
    public function index()
    {
        $this->saveLocationInfo();
        $userId    = Auth::id();
        $userName  = Auth::user()->name;
        $setting_1 = Auth::user()->setting_1;
        $setting_2 = Auth::user()->setting_2;
        $lat       = Auth::user()->lat;
        $lng       = Auth::user()->lng;
        $globe_ids = Auth::user()->globe_ids;
        $nameList = DB::table('users')->where('id', '<>', $userId)->pluck('name');
        $globe_ids_array = explode(',', $globe_ids);
        $newData = "";
        if(count($globe_ids_array) > 0 && $globe_ids_array[0] != ""){
            foreach($globe_ids_array as $globe_id){
                $userInfo = DB::table('users')->where('name', $globe_id)->first();
                $globe_info = '{"lat":'.$userInfo->lat.', "lng":'.$userInfo->lng.', "label":"'.$userInfo->name.'"}';
                $newData .= ($newData == "")? $globe_info : "#".$globe_info;
            }
        }else{
            $newData = '';
        }

        return view('home', ['friends' => $nameList,'setting_1'=>$setting_1, 'setting_2'=>$setting_2, 'lat'=>$lat, 'lng'=>$lng, 'newData'=>$newData, 'currentUser' => $userName]);
    }
    private function saveLocationInfo() {
        $userId    = Auth::id();
        $setting_2 = Auth::user()->setting_2;
        $lat       = Auth::user()->lat;
        $lng       = Auth::user()->lng;
        $ip = '198.255.67.36';
        // $ip = \Request::ip();
        $locationInfo = \Location::get($ip);
        $lat = $locationInfo->latitude;
        $lng = $locationInfo->longitude;
        if($setting_2 || $lat || $lng){
            DB::table('users')->where('id', $userId)->update(['lat' => $lat, 'lng' => $lng]);
        }
            
        return true;
    }
}
