<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        return Region::orderBy('name', 'asc')->paginate(20);
    }

    // GET DATA X IDRegion
    //======================
    public function showIdRegion($idRegion)
    {
        return Region::select("*")
            ->where("idRegion", $idRegion)
            ->paginate(20);
    }

    // GET DATA X NAME
    //======================
    public function showName($name)
    {
        return Region::select("*")
            ->where("name", $name)
            ->paginate(20);
    }

    // GET DATA X PADRE COUNTRY
    //======================
    public function showCountry($idCountry)
    {
        return Region::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $region = new Region();
        $region->idCountry = $request->input('idCountry');
        $region->name = $request->input('name');
        $region->state = $request->input('state');
        $region->save();

        return json_encode([
            'msg' => 'Creación con exito',
            'data' => $region
        ]);
    }

    // DELETE
    //======================
    public function destroy($idRegion)
    {
        $Region = Region::select("*")
            ->where("idRegion", $idRegion);
        $Region->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }

    // EDIT
    //======================
    public function update(Request $request)
    {
        $region = Region::where('idRegion', '=', $request->input('idRegion'));
        $region->update($request->all());

        return json_encode([
            'msg' => 'Modificación con exito',
            'data' => Region::select("*")
                ->where("idRegion", $request->input('idRegion'))
                ->get()
        ]);
    }
}
