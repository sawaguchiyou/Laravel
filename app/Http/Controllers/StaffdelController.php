<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models;

class StaffdelController extends Controller
{
   /**
     * ログイン処理
     *
     * @param  Request $request
     * @return Response
     */
    public function staffdel(Request $request){
        // 社員ID
        $staff_id = $request->input("staff_id");
        // パスワード
        $password = $request->input("password");

        $staff_del = DB::table('M_Staff')
            ->WHERE('Staff_ID',$staff_id)
            ->WHERE('Division_No',$password)
            ->delete();

        if($staff_del === 1){
            // 削除完了
            echo "<script>alert('商品情報を削除しました。')</script>";

            return view('index');

        }else{
            // 削除失敗
            echo "<script>alert('商品情報の削除に失敗しました。')</script>";

            return view('staffdel');
        }
    }
}