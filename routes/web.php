<?php
require __DIR__.'/web_ilearn_partial.php';
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

/*===================Function Search===============*/

/*================src_user_register====================  */
Route::post('/search', array('as' => 'search',
    'uses' => 'LaguageController@search'));

Route::get('/', function () {
    return view('index');
});
Route::get('/result', function () {
    return view('result');

});


/*=================/Function Search================*/

/*===================Function Login===============*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dangnhap', [ 'as' => 'dangnhap', 'uses' => 'UserController@getLogin']);
Route::post('dangnhap', [ 'as' => 'dangnhap', 'uses' => 'UserController@postLogin']);

/*===================/Function Login===============*/

Route::get('dangki', [ 'as' => 'dangki', 'uses' => 'UserController@getRegister']);
Route::post('dangki', [ 'as' => 'dangki', 'uses' => 'UserController@postRegister']);
/*================/src_user_register====================  */
// setting
 Route::POST('/settings' ,['as'=> 'settingUpdate', 'uses' => 'SettingController@update' ]);


Route::get('/settings', function () {
  return view('frontend.settings');
});

Route::get('/historys', function () {
     return view('frontend.history');
 });

 Route::get('getAddCreateDictMeaning/{index}', function ($index) {
    return view('frontend.layout.partial.create-dict-meaning')->with(['index' => $index])->render();
 });

Route::get('test', function(){
     $data = App\Models\User::where('id_user','3')->first()->status->toArray();
     var_dump($data);
});


Route::group(['prefix' => 'admin'], function () {
    // Đăng nhập
    Route::get('login', function () {
        return view('backend.login');
    })->name('adminLogin');

    // Đăng xuất
    Route::get('logout', 'AdminController@logout')->name('adminLogout');

    // Kiểm tra đăng nhập
    Route::post('checkLogin', 'AdminController@login')->name('adminCheckLogin');

    // Trang chủ
    Route::get('home', function () {
        return view('backend.dict.approval');
    })->name('adminHome')->middleware('adminLogin');

    // Quản lý từ điển
    Route::group(['prefix' => 'dict','middleware'=>'adminLogin'], function () {
        // Thêm từ
        Route::get('create', function(){
            return view('backend.dict.create');
        })->name('adminDictCreate');

        // Duyệt từ
        Route::get('approve', function () {
            return view('backend.dict.approval');
        })->name('adminDictApprove');

        // Thống kê
        Route::get('collect', function () {
            return view('backend.dict.collect');
        })->name('adminDictCollect');

        // Thêm file scv
        Route::get('upload', function () {
            return view('backend.dict.upload');
        })->name('adminDictUpload');
    });

    // Quản lý tài khoản
    Route::group(['prefix' => 'account','middleware'=>'adminLogin'], function () {
        Route::get('get', 'UserManagementController@getAccount')->name('adminUserManagement');

        Route::post('status', 'UserManagementController@changeStatus');

        Route::post('role', 'UserManagementController@changeRole');
    });

    // Thông tin cá nhân
    Route::group(['prefix' => 'profile','middleware'=>'adminLogin'], function () {
        Route::get('get', 'AdminController@getProfile')->name('adminProfile');

        Route::post('update', 'AdminController@updateProfile')->name('adminUpdateProfile');

        Route::post('changePassword','AdminController@changePassword')->name('adminChangePassword');
    });
});


















// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('test', function (){
//    return view('frontend.ilearn');
// });

