<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use app\Models;
use Validator;

class SignupController extends Controller{

  /**
   * バリデーション処理
   *
   * @param  array $request
   * @return Response
   */
  public function validator(Request $request)
  {
    $staff_id = $request->input('staff_id');
    $validator = Validator::make($request->all(), [
      'staff_id' => 'required|regex:/^[a-zA-Z0-9]+$/',
      'staff_name' => 'required|string',
      'password' => 'required|integer'
    ])->validate();
  }

   /**
    * 社員情報重複チェック
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

        if(!empty($staff_id)){
          // 入力値チェック
          $this->validator($request);

        }else{
          echo "<script>alert('社員IDが未入力です。')</script>";
          return view('signup');
        }
        // 社員ID重複チェック
        $staff = $this->select($staff_id);

        if($staff === config('const.STAFF_NOT_COUNT')){
          $result = DB::table('M_Staff')
              ->insert([
                  'Staff_ID' => $staff_id,
                  'Staff_Name' => $staff_name,
                  'Division_No' => $password,
                  'insert_date' => Carbon::now(),
              ]);
        }else{
          echo "<script>alert('社員IDが重複しています。')</script>";
          return view('signup');
        }

        if($result === true){
            // 新規登録完了
            echo "<script>alert('新規登録完了しました。')</script>";

            return view('index');

        }else{
            // 新規登録失敗
            echo "<script>alert('社員IDの登録に失敗しました。')</script>";

            return view('index');
        }
    }
}
