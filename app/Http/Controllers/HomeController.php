<?php

namespace App\Http\Controllers;

use App\Utilities\FormatDate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
  
        return view('Pages.index');
    }

    public function facture(){
        
    }
}
