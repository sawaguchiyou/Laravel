<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

class UsersController extends Controller
{

      public function export(){

      	 return Excel::download(new UsersExport, 'users.xlsx');

      }
}
