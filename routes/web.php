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

/*=================== GUEST AREA ===============*/
Route::get('/result', function () {
    return view('result');
});

Route::get('/', array('as' => '',
    'uses' => 'LaguageController@getAllLanguage'));

Route::get('/search', array('as' => 'search',
    'uses' => 'LaguageController@search'));

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('dangnhap', [ 'as' => 'dangnhap', 'uses' => 'UserController@getLogin']);
Route::post('dangnhap', [ 'as' => 'dangnhap', 'uses' => 'UserController@postLogin']);

Route::get('dangki', [ 'as' => 'dangki', 'uses' => 'UserController@getRegister']);
Route::post('dangki', [ 'as' => 'dangki', 'uses' => 'UserController@postRegister']);
/*=================== /.GUEST AREA ===============*/


/*=================== USER AREA ===============*/
// setting
Route::POST('/settings' ,['as'=> 'settingUpdate', 'uses' => 'SettingController@update' ]);

Route::get('/settings', function () {
        return view('frontend.settings');
    });
Route::get('/historys', function () {
        return view('frontend.historys');
    });

Route::POST('HistoryAddNew', 'HistoryController@addNew');
Route::POST('HistoryDelete', 'HistoryController@deleteRecordByAjax');

Route::get('/historys','HistoryController@store' );

Route::POST('/historys/delete' ,['as'=> 'HistoryDelete', 'uses' => 'HistoryController@deleteRecordByAjax' ]);
Route::POST('/historys/update' ,['as'=> 'historyUpdate', 'uses' => 'HistoryController@update' ]);

Route::POST('/historys/addNew' ,['as'=> 'HistoryAddNew', 'uses' => 'HistoryController@AddNew' ]);

Route::get('getAddCreateDictMeaning/{index}', function ($index) {
    return view('frontend.layout.partial.create-dict-meaning')->with(['index' => $index])->render();
 });

// Push notification
Route::get('pushWord','NotificationController@getWordNotification');
Route::get('pushTime','NotificationController@getTimeNotification');
/*=================== /.USER AREA ===============*/

Route::get('test', function(){
    return view('backend.index');
});

/*=================== ADMIN AREA ===============*/
Route::group(['prefix' => 'admin'], function () {
    // Đăng nhập
    Route::get('login', 'AdminController@getLogin')->name('adminGetLogin');
    Route::post('login', 'AdminController@postLogin')->name('adminPostLogin');

    // Đăng xuất
    Route::get('logout', 'AdminController@logout')->name('adminLogout');

    // Trang chủ
    Route::get('home', 'DictionaryManagementController@home')->name('adminHome')->middleware('adminLogin');

    // Quản lý từ điển
    Route::group(['prefix' => 'dict','middleware'=>'adminLogin'], function () {
        // Thêm từ
        Route::get('create', 'DictionaryManagementController@home')->name('adminDictCreate');
        Route::post('create', 'DictionaryManagementController@createWord')->name('adminDictCreateWord');

        // Tra từ adminDictSearch
        Route::get('search', 'DictionaryManagementController@displaySearch')->name('adminDictSearch');
        Route::get('search-word', 'DictionaryManagementController@getSearch')->name('adminDictSearchWord');

        // Xóa từ
        Route::post('delete', 'DictionaryManagementController@deleteWord');

        // Cập nhật từ
        Route::post('update', 'DictionaryManagementController@updateWord')->name('adminDictUpdateWord');

        // Thống kê
        Route::get('collect', 'StatisticManagementController@displayStatisticalResult')->name('adminDictCollect');
        Route::post('collect-added', 'StatisticManagementController@displayStatisticalResultByCondition')->name('adminDictCollectByCondition');

        // Thêm file scv
        Route::get('upload', function () {
            return view('backend.dict.upload');
        })->name('adminDictUpload');
        Route::post('upload', 'UploadExcelController@importExcel')->name('adminDictUpload');
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

        Route::get('changePassword','AdminController@getChangePassword')->name('adminGetChangePassword');
        Route::post('changePassword','AdminController@postChangePassword')->name('adminPostChangePassword');
    });
});
/*=================== /.ADMIN AREA ===============*/


















// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('test', function (){
//    return view('frontend.ilearn');
// });

