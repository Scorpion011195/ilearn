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

Route::get('/result', function () {
    return view('result');

});

Route::get('/', array('as' => '',
    'uses' => 'LaguageController@getAllLanguage'));

Route::get('/search', array('as' => 'search',
    'uses' => 'LaguageController@getAllLanguage'));


/*=================/Function Search================*/

/*===================Function Login===============*/
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/historys','HistoryController@store' );
Route::POST('/historys/update' ,['as'=> 'historyUpdate', 'uses' => 'HistoryController@update' ]);


 Route::get('getAddCreateDictMeaning/{index}', function ($index) {
    return view('frontend.layout.partial.create-dict-meaning')->with(['index' => $index])->render();
 });


/*=================== Test area ===============*/
Route::get('test', 'StatisticManagementController@test');

Route::get('tests', function(){
    echo DB::table('vietnamese')->max('id_mapping');
});
/*=================== /.Test area ===============*/


/*=================== Admin area ===============*/
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
    Route::get('home', 'DictionaryManagementController@home')->name('adminHome')->middleware('adminLogin');

    // Quản lý từ điển
    Route::group(['prefix' => 'dict','middleware'=>'adminLogin'], function () {
        // Thêm từ
        Route::get('create', 'DictionaryManagementController@home')->name('adminDictCreate');
        Route::post('create-word', 'DictionaryManagementController@createWord')->name('adminDictCreateWord');

        //Tra từ adminDictSearch
        Route::get('search', 'DictionaryManagementController@getSearch')->name('adminDictSearch');
        Route::post('search-word', 'DictionaryManagementController@searchWord')->name('adminDictSearchWord');

        // Thống kê
        Route::get('collect', 'StatisticManagementController@statisticAllUser')->name('adminDictCollect');

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

        Route::post('delete', 'UserManagementController@deleteUser');

        Route::get('detail/{id}', 'UserManagementController@getDetailUser')->name('adminGetDetailUser');
        Route::post('updateDetail', 'UserManagementController@postDetailUser')->name('adminPostDetailUser');

        Route::get('search', 'UserManagementController@searchUser')->name('adminSearchUser');
    });

    // Thông tin cá nhân
    Route::group(['prefix' => 'profile','middleware'=>'adminLogin'], function () {
        Route::get('get', 'AdminController@getProfile')->name('adminProfile');

        Route::post('update', 'AdminController@updateProfile')->name('adminUpdateProfile');

        Route::post('changePassword','AdminController@changePassword')->name('adminChangePassword');
    });
});
/*=================== /.Admin area ===============*/


















// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('test', function (){
//    return view('frontend.ilearn');
// });

