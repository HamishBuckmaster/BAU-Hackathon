<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SellOut;

class SellOutController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SellOut::all();
        return $data;
    }
}
