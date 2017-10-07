<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promo;

class PromoController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Promo::all();
        return $data;
    }
}
