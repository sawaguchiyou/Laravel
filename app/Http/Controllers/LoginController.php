<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models;

class LoginController extends Controller
{
   /**
     * ログイン処理
     *
     * @param  Request $request
     * @return Response
     */
    public function signin(Request $request)
    {
    	// postで受け取った社員IDを変数に格納
        $staff_id = $request->input('user_id');
        // postで受け取ったpaswordを変数に格納
        $password = $request->input('password');
        // SQL文
		$staff = DB::table('M_Staff')
				->WHERE('Staff_ID',$staff_id)
				->WHERE('Division_No',$password)
				->count();

		if($staff === config('const.STAFF_COUNT')){
			return view('mainmenu');
		}else{
			echo "<script>alert('社員IDもしくはパスワードが誤っているためログインできません。再度入力してください。')</script>";
			return view('index');
		}

    }

}
