<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use app\Models;
use Validator;

class StaffController extends Controller{

   /**
    * 社員情報重複チェック
    *
    * @param  String $id
    * @return Response
    */
    public function select(?String $id){
        $list = DB::table('M_Staff')
        ->WHERE('Staff_ID',$id)
        ->count();
        return $list;
    }

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

        if($staff_id === null || $staff_id === ''){
          return redirect('/')->with('message', '社員IDが未入力です。');
        }else{
          // ログイン処理
          $staff = DB::table('M_Staff')
            ->WHERE('Staff_ID',$staff_id)
            ->WHERE('Division_No',$password)
            ->count();
        }

     		if($staff === config('const.STAFF_COUNT')){
     			return view('mainmenu');
     		}else{
     			return redirect('/')->with('message', '社員IDもしくはパスワードが誤っているためログインできません。再度入力してください。');
     		}
     }

    /**
     * 社員情報登録処理
     *
     * @param  Request $request
     * @return Response
     */
    public function staffinsert(Request $request){

        // postで受け取った社員IDを変数に格納
        $staff_id = $request->input('staff_id');
        // postで受け取った社員名を変数に格納
        $staff_name = $request->input('staff_name');
        // postで受け取ったパスワードを変数に格納
        $password = $request->input('password');

        // 入力値チェック
        $validator = new ValidatorController;
        $validator->validatorstaff($request);
        // 社員ID重複チェックのデータ取得
        $staff = $this->select($staff_id);

        // 重複チェック
        if($staff === config('const.STAFF_NOT_COUNT')){
          $result = DB::table('M_Staff')
              ->insert([
                  'Staff_ID' => $staff_id,
                  'Staff_Name' => $staff_name,
                  'Division_No' => $password,
                  'insert_date' => Carbon::now()
              ]);
        }else{
          // 社員ID重複時
          return redirect('/signup')->with('message', '社員IDが重複しています。');
        }

        // 登録結果
        if($result === true){
            // 新規登録完了
            return redirect('/')->with('message', '社員IDの登録が完了しました。');
        }else{
            // 新規登録失敗
            return redirect('/')->with('message', '社員IDの登録に失敗しました。');
        }
    }

     /**
      * 社員情報削除処理
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
             return redirect('/')->with('message', '社員情報を削除しました。');
         }else{
             // 削除失敗
             return redirect('/')->with('message', '社員情報の削除に失敗しました。');
         }
     }

}
