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
    $array = fgetcsv($file);

    // foreach($array as $key => $arrays){
      // var_dump($key);
      // var_dump($arrays);
    $insert = DB::connection('mysql_product')->table('M_Product')->insert($array);
    //     ->insert([
    //       'Product_ID' => $arrays[0],
    //       'Product_Name' => $arrays[1],
    //       'Product_Val' => $arrays[2]
    //     ]);
    }

    // echo '<table>';
    //   while (($array = fgetcsv($file)) !== FALSE) {
    //
    //     echo "<tr>";
    //     for($i = 0; $i < count($array); ++$i ){
    //       $elem = nl2br(mb_convert_encoding($array[$i], 'UTF-8', 'SJIS'));
    //       echo("<td>".$elem."</td>");
    //       var_dump($elem);
    //     }
    //     echo "</tr>";
    //   }
    // echo '</table>';

    // $delete = DB::connection('mysql_product')->table('M_Product')
    //   ->truncate();
    //
    // if($delete == NULL){
    //   $insert = DB::connection('mysql_product')->table('M_Product')
    //     ->insert([
    //       'Product_ID' => $elem[0],
    //       'Product_Name' => $elem[1],
    //       'Product_Val' => $elem[2],
    //       'insert_date' => $elem[3]
    //     ]);
    // }
  }

?>
