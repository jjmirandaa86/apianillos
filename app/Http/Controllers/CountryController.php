<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        return Country::orderBy('name', 'asc')->paginate(20);
    }

    // GET DATA X IDCOUNTRY
    //======================
    public function showIdCountry($idCountry)
    {
        return Country::select("*")
            ->where("idCountry", $idCountry)
            ->paginate(20);
    }

    // GET DATA X NAME
    //======================
    public function showName($name)
    {
        return Country::select("*")
            ->where("name", $name)
            ->paginate(20);
    }

    // GET DATA X CURRENCY
    //======================
    public function showCurrency($currency)
    {
        return Country::select("*")
            ->where("currency", $currency)
            ->paginate(20);
    }

    // CREATE
    //======================
    public function create(Request $request)
    {
        $country = new Country();
        $country->idCountry = $request->input('idCountry');
        $country->name = $request->input('name');
        $country->currency = $request->input('currency');
        $country->simbol = $request->input('simbol');
        $country->state = $request->input('state');
        $country->save();

        return json_encode([
            'msg' => 'Creación con exito',
            'data' => $country
        ]);
    }

    // DELETE
    //======================
    public function destroy($idCountry)
    {
        $country = Country::select("*")
            ->where("idCountry", $idCountry);
        $country->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }

    // EDIT
    //======================
    public function update(Request $request)
    {
        $country = Country::where('idCountry', '=', $request->input('idCountry'));
        $country->update($request->all());

        return json_encode([
            'msg' => 'Modificación con exito',
            'data' => Country::select("*")
                ->where("idCountry", $request->input('idCountry'))
                ->get()
        ]);
    }
}
