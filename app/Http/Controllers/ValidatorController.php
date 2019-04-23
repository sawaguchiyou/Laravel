<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ValidatorController extends Controller{

  /**
   * バリデーション処理
   *
   * @param  array $request
   * @return Response
   */
  public function validator(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'staff_id' => 'required|regex:/^[a-zA-Z0-9]+$/|max:10',
      'staff_name' => 'required|string|max:40',
      'password' => 'required|min:4|max:11'
    ])->validate();
  }
}
