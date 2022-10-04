<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NailController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('nailviews/top');
});
Route::get('/', [NailController::class, 'top']);

Route::post('/like', [NailController::class, 'like'])->name('nails.like');

Route::post('/searchresult', [NailController::class, 'nailsresult']);

Route::get('/mypage', function () {
    return view('nailviews/mypage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix('nailist')->name('nailist.')->group(function () {

    Route::get('/dashboard', function () {
        return view('nailist.auth.dashboard');
    })->name('dashboard');

    require __DIR__ . '/nailist.php';
});
// require __DIR__.'/nailist.php';

Route::get('/nailistlist', [NailController::class, 'nail'])->middleware('auth:nailist');

Route::get('dashboard', [NailController::class, 'nails']);
// Route::get('dashboard', [NailController::class, 'liked']);



Route::get('/memberregister', function () {
    return view('auth/register');
});

Route::get('/nailistregister', function () {
    return view('nailist/auth/register');
});

Route::get('/memberlogin', function () {
    return view('auth/login');
});

Route::get('/member', function () {
    return view('nailviews/member');
});


Route::get('/top', function () {
    return view('nailviews/top');
});

Route::get('/mybooking', function () {
    return view('nailviews/mybooking');
});

Route::get('/nailist', function () {
    return view('nailviews/nailist');
});

Route::get('/signup/{{$id}}/', function () {
    return view('nailviews/signup/{{$id}}/');
});

Route::post('/nailcomp', [NailController::class, 'store']);

Route::get('/nailup', function () {
    return view('nailviews/nailup');
})->middleware('auth:nailist');

Route::get('/authlogin', function () {
    return view('auth/login');
});

Route::get('/nailistlogin', function () {
    return view('nailist/auth/login');
});

Route::get('/nailistdashboard', function () {
    return view('nailist/auth/dashboard');
});


Route::post('/top', [NailController::class, 'top']);

Route::get('/nailedit/{id}/', 'App\Http\Controllers\NailController@nailedit');
Route::post('/nailedit/{id}/', [NailController::class, 'nailedit']);

Route::post('/naileditcomplete/{id}/', [NailController::class, 'update']);
Route::get('/naileditcomplete/{id}/', function () {
    return view('/nailviews/naileditcomplete/{id}/');
})->middleware('auth:nailist');

Route::get('/nailistedit', [NailController::class, 'nailistpage'])->middleware('auth:nailist');

Route::post('/nailisteditcomplete/{id}/', [NailController::class, 'nailistupdate']);
Route::get('/nailisteditcomplete/{id}/', function () {
    return view('/nailviews/nailisteditcomplete/{id}/');
})->middleware('auth:nailist');








// Route::get('/mypage/{id}/', 'App\Http\Controllers\NailController@useredit');
// Route::post('/mypage/{id}/', [NailController::class, 'useredit']);

Route::get('/mypage', [NailController::class, 'userpage'])->middleware('auth');

Route::post('/mypageeditcomplete/{id}/', [NailController::class, 'userupdate']);
Route::get('/mypageeditcomplete/{id}/', function () {
    return view('/nailviews/mypageeditcomplete/{id}/');
})->middleware('auth:nailist');



// ネイル詳細
Route::get('/naildetail/{id}/', [NailController::class, 'detail'])->name('naildetail');




// Route::post('/naildetail', [NailController::class, 'detail']);

// ネイルの削除
Route::post('/naildestroy/{id}/', [NailController::class, 'destroy'])->middleware('auth:nailist');





// 検索
Route::get('/result', 'App\Http\Controllers\NailController@result');




// いいねボタン
// Route::post('/like', 'App\Http\Controllers\NailController@like')->name('nails.like');



// 退会
Route::get('/userdelete', function () {
    return view('nailviews/userdelete');
});
Route::get('/userdeletecomp', [NailController::class, 'userdelete']);


Route::get('/nailistdelete', function () {
    return view('nailviews/nailistdelete');
})->middleware('auth:nailist');
Route::get('/nailistdeletecomp', [NailController::class, 'nailistdelete'])->middleware('auth:nailist');





Route::get('/good', [NailController::class, 'good']);
