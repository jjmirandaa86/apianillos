<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    // GET DATA X IDCOUNTRY
    //======================
    public function showStateTableIdCountry(Request $request)
    {
        return State::select("*")
            ->where("tableReference", $request->input('table'))
            ->where("idCountry", $request->input('idCountry'))
            ->paginate(20);
    }
}
