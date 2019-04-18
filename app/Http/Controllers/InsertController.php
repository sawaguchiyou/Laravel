<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use app\Models;

class InsertController extends Controller{
   /**
     * ログイン処理
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

    public function insert(Request $request){
        
        // postで受け取った社員IDを変数に格納
        $product_id = $request->input('syouhin-code');
        // postで受け取ったpaswordを変数に格納
        $product_name = $request->input('syouhin-name');
        // postで受け取った単価を変数に格納
        $product_val = $request->input('tanka-code');

        if($product_id === NULL){
            echo "<script>alert('商品IDが未入力です。')</script>";
			return view('insert');
        }else{
            // selectの呼び出し
            $product = $this->select($product_id);
        }

        if($product === 0){
        $result = DB::connection('mysql_product')->table('M_Product')
            ->insert([
                'Product_ID' => $product_id,
                'Product_Name' => $product_name,
                'Product_Val' => $product_val,
                'insert_date' => Carbon::now(),
            ]);

            echo "<script>alert('新規登録完了しました。')</script>";
			return view('insert');
        }else{
            echo "<script>alert('商品IDが重複しているため新規登録できませんでした。商品IDをもう一度ご確認ください。')</script>";
			return view('insert');
        }
    }
}

