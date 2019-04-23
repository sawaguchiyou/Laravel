<?php

use Illuminate\Http\Request;
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

// 初期表示
Route::get('/', function () {
    return view('index');
});

// 初期表示
Route::get('/signup', function () {
    return view('signup');
});


// 検索・更新画面の「戻る」ボタン押下時
Route::post('/back', function () {
    return view('mainmenu');
});

Route::post('/back/top', function () {
    return view('index');
});

// ログイン画面で受け取ったuser_idとパスワードをコントローラに渡す
Route::post('signin', 'LoginController@signin');

// mainmenuでの行き先振り分け
Route::post('main', function (Request $request) {
	$routin = $request->input("name");
	if($routin == 'main'){
		return view('search');
	}else if($routin == 'ins'){
		return view('insert');
  }else if($routin == 'exp'){
		return view('export');
	}else if($routin == 'exit'){
		return view('index');
	}
});

// 商品コード検索処理
Route::post('/main/search', 'MainController@productsearch');

// 商品情報更新処理
Route::post('/main/update', 'MainController@productupdate');

// 商品情報削除処理
Route::post('/main/delete', 'MainController@productdelete');

// 商品新規登録処理
Route::post('/insert', 'InsertController@insert');

// 一覧取得処理
Route::post('/export/get', 'ExportController@get');

// csv出力処理
Route::post('/export/output', 'ExportController@output');


// 社員新規登録処理
Route::post('/staff/ins' ,'SignupController@staffinsert');

// 社員新規登録画面遷移
Route::post('signup', function () {
    return view('signup');
});

// 社員情報削除処理
Route::post('/staff/del' ,'StaffdelController@staffdel');

// 社員情報削除画面遷移
Route::post('staffdel', function () {
    return view('staffdel');
});
