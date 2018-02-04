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

Route::get('/', function(){
  return redirect('/admin');
});;
Route::get('/admin', function(){
  return view('admin.index');
});
Route::get('/', function () {
    return view('welcome');
});


/*Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
  Route::get('/', function(){
    $data['role'] = \App\UserRole::whereUserId(Auth::id())->get();
    return view('home', $data);
  });
  Route::post('upgrade', function(Request $request){
    if($request->ajax()){
      $msg['success'] = 'false';
      $user = \App\User::find($request->id);
      if ($user)
        $user->putRole($request->level);
        $msg['success'] = 'true';

        return response()->json($msg);
    }
  });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
  Route::get('/', function(){
    $data['users'] = \App\User::whereDoesntHave('roles')->get();
    return view('admin', $data);
  });
});*/

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Auth::routes();
