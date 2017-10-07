<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterData;

class MasterDataController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MasterData::all();
        return $data;
    }

    public function id($id)
    {
        $data = MasterData::find($id);
        return $data;
    }
}
