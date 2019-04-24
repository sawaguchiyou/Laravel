<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models;
use Carbon\Carbon;
use Validator;
use Response;
use App\User;

class ExportController extends Controller{

  // データ抽出
  public function get (Request $request){
    $list = DB::connection('mysql_product')->table('M_Product')
      ->get();
    return view('export',compact('list'));
  }
ふぁだ
  // データ出力
  public function output (Request $request){
    //
    $list = DB::connection('mysql_product')->table('M_Product')
      ->get();

    $stream = fopen('php://output', 'w');
    fputcsv($stream, ['商品ID', '商品名', '単価', '最終更新日時']);

    foreach($list as $lists){
      fputcsv(
        $stream,[
          $lists->Product_ID,
          $lists->Product_Name,
          $lists->Product_Val,
          $lists->insert_date
      ]);
    }

    $carbon = carbon::now();

    $headers = array(
      'Content-Type' => 'text/csv',
      'Content-Disposition' => 'attachment; filename = '."$carbon".'.csv'
    );

    return Response::make(
      stream_get_contents($stream),
      200,
      $headers
    );
  }
}

 ?>
