<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\Events\InviteFriend;
use App\Notifications\InviteFriendNotification;
use Illuminate\Support\Facades\Auth;
use App\User;

Route::get('/', function () {
    
    return view('auth/login');
});

Route::get('get-ip-details', function () {
    $ip = '198.255.67.36';
    // $ip = \Request::ip();
    $data = \Location::get($ip);
    dd($data);
});

// if (Auth::check())
// {
     Route::get('invite',function(Request $request){
        // dd($request->all());
        $senderName = Auth::user()->name;
        $friendName = $request->input('friend_name');
        $socialType = $request->input('social_type');

        event(new InviteFriend($senderName, $friendName, $socialType));
        // $user = DB::table('users')->where('name', $friendName)->first();
        $user = App\User::first();
        
        $user->notify(new InviteFriendNotification());
    });
    Route::get('setting',function(Request $request){
        $setting_1 = $request->input('setting_1');
        $setting_2 = $request->input('setting_2');
        $userId = Auth::id();
        DB::table('users')->where('id', $userId)->update(['setting_1' => $setting_1, 'setting_2' => $setting_2]);
    });

    Route::get('getlocationinfo',function(Request $request){
        $userName = $request->input('userName');
        $userInfo = DB::table('users')->where('name', $userName)->first();
        $setting_1 = $userInfo->setting_1;
        $currentId = Auth::id();
        $globe_ids = Auth::user()->globe_ids;
        $idArray  = explode(',', $globe_ids);
        if (in_array($userName, $idArray)) {
            $result['info'] = "exist";
        } else if(!$setting_1) {
            $result['info'] = "disable";
        }else {
            $globe_ids .= ($globe_ids == '')? $userName : ",".$userName;
            DB::table('users')->where('id', $currentId)->update(['globe_ids' => $globe_ids]);
            $result['info'] = $userInfo;
        }
        $result['result'] = "success";
        $result['ctrl']   = "get_location_info";
        return $result;
    });
    Route::get('clear',function(Request $request){
        $userName = $request->input('userName');
        $userId = Auth::id();
        DB::table('users')->where('id', $userId)->update(['globe_ids' => '']);
        $result["result"] = "success";
        $result["ctrl"]   = "clear";
    });
// }


Auth::routes();

//facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//linkedin
Route::get('login/linkedin', 'Auth\LinkedinController@redirectToProvider');
Route::get('login/linkedin/callback', 'Auth\LinkedinController@handleProviderCallback');

//google
Route::get('login/google', 'Auth\GoogleController@redirectToProvider');
Route::get('login/google/callback', 'Auth\GoogleController@handleProviderCallback');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');
