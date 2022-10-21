<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index(){
        return view("pages.rapports");
    }

    public function daily(){
        return view("Pages.rapport.dailyRapport");
    }
    
    public function weekly(){
       return view("Pages.rapport.weeklyRapport"); 
    }

    public function monthly(){
        return view("pages.rapport.monthlyRapport");
    }


}
