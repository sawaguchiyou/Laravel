<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models;
use Carbon\Carbon;
use Validator;

class ExportController extends Controller{
  public function get (Request $request){
    echo 'get!!';
  }

  public function output (Request $request){
    echo 'output!!';
  }
}

 ?>
