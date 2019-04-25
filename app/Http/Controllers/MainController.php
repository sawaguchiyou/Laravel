<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models;
use Carbon\Carbon;
use Validator;

class MainController extends Controller
{
    /**
     * 商品コード重複チェック
     *
     * @param  Request $request
     * @return Response
     */
    public function select(?String $id){
      $list = DB::connection('mysql_product')->table('M_Product')
        ->where('Product_ID',$id)
        ->count();
      return $list;
    }

    /**
     * 商品コード検索処理
     *
     * @param  Request $request
     * @return Response
     */
    public function productsearch(Request $request)
    {
        // 画面で入力した商品コードを格納
        $product_code = $request->input("product_code");

        if($product_code != null || $product_code != ''){
            // 商品コードで検索
            $product_search = DB::connection('mysql_product')->table('M_Product')
                ->WHERE('Product_ID',$product_code)
                ->get();
        }else{
            echo "<script>alert('商品コードが未入力です。')</script>";
            return view('search');
        }

        if(isset($product_search[0])){
            $product_id = $product_search[0]->Product_ID;
            $product_name = $product_search[0]->Product_Name;
            $product_val = $product_search[0]->Product_Val;
            $insert_date = $product_search[0]->insert_date;
        }else{
            echo "<script>alert('商品情報を取得できませんでした。')</script>";
            return view('search');
        }

        return view('search',compact('product_code','product_name','product_val','insert_date'));

    }

    /**
     * 更新処理
     *
     * @param  Request $request
     * @return Response
     */
    public function productupdate(Request $request)
    {
        // 入力値チェック
        $validator = new ValidatorController;
        $validator->validatorproduct($request);
        // 商品コード
        $product_code = $request->input("product_code");
        // 商品名
        $product_name = $request->input("product_name");
        // 商品名
        $product_val = $request->input("product_value");

        if(empty($product_code)){
          // 商品コード未入力
          return redirect('/main')->with('message', '商品コードが未入力です。');
        }

        $product_update = DB::connection('mysql_product')->table('M_Product')
            ->WHERE('Product_ID',$product_code)
            ->update([
                'Product_Name' => $product_name,
                'Product_Val' => $product_val,
                'insert_date' => Carbon::now()
        ]);

        if($product_update >= 1){
            // 更新完了
            echo "<script>alert('商品情報の更新が完了しました。')</script>";
            return view('search');
        }else{
            // 更新失敗
            echo "<script>alert('商品情報の更新に失敗しました。')</script>";
            return view('search');
        }
    }

    /**
     * 削除処理
     *
     * @param  Request $request
     * @return Response
     */
    public function productdelete(Request $request)
    {
        // 商品コード
        $product_code = $request->input("product_code");

        $product_delete = DB::connection('mysql_product')->table('M_Product')
            ->WHERE('Product_ID',$product_code)
            ->delete();

        if($product_delete >= 1){
            // 削除完了
            echo "<script>alert('商品情報を削除しました。')</script>";
            return view('search');
        }else{
            // 削除失敗
            echo "<script>alert('商品情報の削除に失敗しました。')</script>";
            return view('search');
        }
    }

    /**
     * 新規登録処理
     *
     * @param  Request $request
     * @return Response
     */
    public function productinsert(Request $request)
    {
        // 入力値チェック
        $validator = new ValidatorController;
        $validator->validatorproduct($request);
        // postで受け取った商品コードを変数に格納
        $product_code = $request->input('product_code');
        // postで受け取ったpaswordを変数に格納
        $product_name = $request->input('product_name');
        // postで受け取った単価を変数に格納
        $product_val = $request->input('product_value');

        // selectの呼び出し
        $product = $this->select($product_code);

        if($product === config('const.PRODUCT_COUNT')){
          $result = DB::connection('mysql_product')->table('M_Product')
            ->insert([
              'Product_ID' => $product_code,
              'Product_Name' => $product_name,
              'Product_Val' => $product_val,
              'insert_date' => Carbon::now()
            ]);

          echo "<script>alert('新規登録完了しました。')</script>";
          return view('insert');
        }else{
          echo "<script>alert('商品IDが重複しているため新規登録できませんでした。商品IDをもう一度ご確認ください。')</script>";
          return view('insert');
        }
    }

}
