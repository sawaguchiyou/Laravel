<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models;
use Validator;
use Response;
use App\User;



class ImportController extends Controller{
  public static function import (Request $request){
    setlocale(LC_ALL, 'ja_JP.UTF-8');
    $csv = '/home/vagrant/code/Laravel/csv/'.$request->input('csvfile');

    // フォームから送られてきたcsvファイルの受け取り
    $file = fopen($csv, "r");

    // プライマリー回避のための削除
    $truncate = DB::connection('mysql_product')->table('M_Product')
      ->truncate();

    // テーブル削除されていたらインサート実行
    if($truncate == NULL){
      while(($array = fgetcsv($file)) != false){

        $insert = DB::connection('mysql_product')->table('M_Product')
            ->insert([
              'Product_ID' => $array[0],
              'Product_Name' => $array[1],
              'Product_Val' => $array[2],
              'insert_date' => $array[3]

            ]);
        }

        echo "<script>alert('インポート成功')</script>";
        return view('export');

      }else{

        echo "<script>alert('インポート失敗')</script>";
        return view('export');

      }
    }
  }

?>
