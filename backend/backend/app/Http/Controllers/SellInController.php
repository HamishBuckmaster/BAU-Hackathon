<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellIn;

class SellInController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SellIn::all();
        return $data;
    }
}
