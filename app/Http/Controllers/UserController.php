<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\Authenticatable;


use App\Models\User;
use App\Models\Accessuser;
use App\Models\Office;
use App\Models\Region;
use App\Models\Country;


class UserController extends Controller
{
    // ALL
    //======================
    public function show()
    {
        $user = User::select("*")
            ->orderBy('lastName', 'asc')
            ->paginate(20);

        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['password', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // GET DATA X IDUSER
    //======================
    public function showIdUser($idUser)
    {
        $user = User::select("*")
            ->where("idUser", $idUser)
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['api_token', 'password', 'remember_token', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // GET DATA X EMAIL
    //======================
    public function showEmail($email)
    {
        $user = User::select("*")
            ->where("email", $email)
            ->paginate(20);
        $data = $user;
        //Oculto datos que no quiero mostrar
        $user = $user->makeHidden(['api_token', 'password', 'remember_token', 'created_at', 'updated_at']);
        $data->data = $user;
        return $data;
    }

    // CREATE
    //======================
    public function create(Request $request)
    {

        $user = new User();
        $user->idOffice = $request->input('idOffice');
        $user->idUser = $request->input('idUser');
        $user->firtsName = $request->input('firtsName');
        $user->lastName = $request->input('lastName');
        $user->position = $request->input('position');
        $user->profile = $request->input('profile');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        //$user->api_token = Str::random(255);
        $user->state = $request->input('state');
        $user->save();

        $user = $user->makeHidden(['api_token', 'password']);
        return json_encode([
            'msg' => 'Creación con exito',
            'data' => $user
        ]);
    }

    // DELETE
    //======================
    public function destroy($idUser)
    {
        $user = User::select("*")
            ->where("idUser", $idUser);
        $user->delete();
        return json_encode(['msg' => 'exito eliminación']);
    }

    // EDIT
    //======================
    public function update(Request $request)
    {
        $user = User::find($request->input('idUser'));
        $user->idOffice = $request->input('idOffice');
        $user->idUser = $request->input('idUser');
        $user->firtsName = $request->input('firtsName');
        $user->lastName = $request->input('lastName');
        $user->position = $request->input('position');
        $user->profile = $request->input('profile');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->api_token = $request->input('api_token');
        $user->state = $request->input('state');
        $user->save();

        return json_encode([
            'msg' => 'Modificación con exito',
            'data' => $user
        ]);
    }

    // VALIDATE EMAIL y PASSWORD
    //======================
    public function login(Request $request)
    {
        $user = User::where("idUser", $request->input('idUser'))
            ->first();
        if (!is_null($user) && Hash::check($request->input('password'), $user->password)) {

            //Almaceno el login y token 
            $accessuser = new Accessuser();
            $accessuser->idUser = $user->idUser;
            $accessuser->macAddress = substr(shell_exec('getmac'), 159, 20); //substr(exec('getmac'), 0, 17);
            $accessuser->ipAddress = $request->ip();
            $accessuser->save();

            //Actualizo
            $user = User::find($request->input('idUser'));
            $user->api_token = Str::random(255);
            $user->save();

            $val = DB::table('users')
                ->join('accessusers', 'accessusers.idUser', '=', 'users.idUser')
                ->join('offices', 'offices.idOffice', '=', 'users.idOffice')
                ->join('regions', 'regions.idRegion', '=', 'offices.idRegion')
                ->join('countries', 'countries.idCountry', '=', 'regions.idCountry')
                ->select(
                    "users.idUser",
                    "users.firtsName",
                    "users.lastName",
                    "users.position",
                    "users.profile",
                    "users.email",
                    "users.api_token",
                    "users.state",
                    "offices.idOffice",
                    "offices.name as officeName",
                    "regions.idRegion",
                    "regions.name as regionsName",
                    "countries.idCountry",
                    "countries.name as countryName",
                    "countries.currency",
                    "countries.simbol"
                )
                ->where("users.idUser", $request->input('idUser'))
                ->get();

            return json_encode([
                'msg' => 'Login Exitoso',
                'user' => $val,
            ]);
        } else {
            return json_encode(['msg' => 'Usuario o contraseña invalida']);
        }
    }
}
