<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use app\Models;

class SignupController extends Controller{
    /**
     * ログイン処理
    *
    * @param  Request $request
    * @return Response
    */
 
    public function select(?String $id){
        $list = DB::table('M_Staff')
        ->WHERE('Staff_ID',$id)
        ->count();
        return $list;
    }
 
    public function staffinsert(Request $request){
        
        // postで受け取った社員IDを変数に格納
        $staff_id = $request->input('staff_id');
        // postで受け取った社員名を変数に格納
        $staff_name = $request->input('staff_name');
        // postで受け取ったパスワードを変数に格納
        $password = $request->input('password');

        if($staff_id === NULL){
            echo "<script>alert('社員IDが未入力です。')</script>";
            return view('signup');
        }else{
            // selectの呼び出し
            $staff = $this->select($staff_id);
        }

        if($staff === 0){
        $result = DB::table('M_Staff')
            ->insert([
                'Staff_ID' => $staff_id,
                'Staff_Name' => $staff_name,
                'Division_No' => $password,
                'insert_date' => Carbon::now(),
            ]);

            echo "<script>alert('新規登録完了しました。')</script>";
            return view('index');
        }else{
            echo "<script>alert('商品IDが重複しているため新規登録できませんでした。商品IDをもう一度ご確認ください。')</script>";
            return view('signup');
        }
    }
}
 
 