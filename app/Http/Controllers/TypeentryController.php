<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeentry;

class TypeentryController extends Controller
{
    // ALL
    //======================
    public function all()
    {
        return Typeentry::orderBy('name', 'asc')->paginate(20);
    }


    // GET DATA X PADRE COUNTRY
    //======================
    public function getDataXidCountry($idCountry)
    {
        return Typeentry::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $typeEntry = new Typeentry();
        $typeEntry->idCountry = $request->input('idCountry');
        $typeEntry->name = $request->input('name');
        $typeEntry->state = $request->input('state');
        $typeEntry->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // DELETE
    //======================
    public function destroyXIdTypeEntry($idTypeEntry)
    {
        $typeEntry = Typeentry::select("*")
            ->where("idTypeEntry", $idTypeEntry);
        $typeEntry->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }
}
