<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', function () {
    return view('index');
}]);

Route::get('/redirectApp', function () {
    $agent = new Jenssegers\Agent\Agent();
    if ($agent->isAndroidOS()){
        return redirect('Play Store Link');
    }
    else if ($agent->isiOS()){
        return redirect('App Store Link');
    }
    else{
        echo "Application is only available for Android and iOS";
    }
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', function(){
        session()->flush();
        return redirect('/');
    });
    Route::get('/register', function () {
        if(\App\Http\Controllers\UserController::isLoggedIn() && \App\Http\Controllers\UserController::getUserData()['registered']){
            session()->flash('error', 'คุณได้ลงทะเบียนเรียบร้อยแล้ว สามารถแก้ไขข้อมูลได้ผ่านทางแอปพลิเคชั่นเท่านั้น');
            return redirect()->back();
        }
        return view('register');
    });
    Route::post('/register', 'UserController@register');
});

Route::group(['middleware' => ['guest-only']], function () {
    Route::get('/login', ['as' => 'login', function(){
        return view('login');
    }]);
    Route::get('/login/facebook', 'UserController@loginFacebook');
    Route::get('/login/google', 'UserController@loginGoogle');
});

/*
Route::group(['middleware' => ['admin']], function () {
    
});
*/