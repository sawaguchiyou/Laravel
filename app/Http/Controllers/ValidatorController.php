<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ValidatorController extends Controller{

  /**
   * 社員情報登録バリデーション処理
   *
   * @param  array $request
   * @return Response
   */
  public function validatorstaff(Request $request)
  {
    Validator::make($request->all(), [
      'staff_id' => 'required|regex:/^[a-zA-Z0-9]+$/|max:10',
      'staff_name' => 'required|string|max:40',
      'password' => 'required|min:4|max:11'
    ])->validate();
  }

  /**
   * 商品情報更新バリデーション処理
   *
   * @param  array $request
   * @return Response
   */
  public function validatorproduct(Request $request)
  {
    Validator::make($request->all(), [
      'product_code' => 'required|regex:/^[a-zA-Z0-9]+$/|max:8',
      'product_name' => 'required|string|max:40',
      'product_value' => 'required|integer'
    ])->validate();
  }

}
