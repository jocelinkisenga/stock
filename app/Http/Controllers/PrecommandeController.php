<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrecommandeController extends Controller
{
 public function index()
    {
        return view("Pages.precommandes");
    }
}
