<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    // GET DATA X IDUSER DATE
    //======================
    public function showIdUserDate(Request $request)
    {
        return Expense::select("*")
            ->where("idCountry", $request->input('idCountry'))
            ->where("idUser", $request->input('idUser'))
            ->whereBetween('dateInvoice', array($request->input('dateFirst'), $request->input('dateEnd')))
            ->paginate(5);
    }

    // GET DATA X IDUSER DATE - COUNT, TOTAL
    //======================
    public function showIdUserDateCountTotal(Request $request)
    {
        return Expense::selectRaw("idUser, count(*) as countRow, sum(amount) as totalRow")
            ->where("idCountry", $request->input('idCountry'))
            ->where("idUser", $request->input('idUser'))
            ->whereBetween('dateInvoice', array($request->input('dateFirst'), $request->input('dateEnd')))
            ->groupBy('idUser')
            ->paginate(5);
    }

    // GET DATA X IDUSER DATE - MONT, COUNT, TOTAL
    //======================
    public function showIdUserMontDateCountTotal(Request $request)
    {
        return Expense::selectRaw("year(dateInvoice) as year, monthname(dateInvoice) as month, month(dateInvoice) as nummonth, sum(amount) as totalRow")
            ->where("idCountry", $request->input('idCountry'))
            ->where("idUser", $request->input('idUser'))
            ->whereBetween('dateInvoice', array($request->input('dateFirst'), $request->input('dateEnd')))
            ->groupby('year', 'month', 'nummonth')
            ->orderBy('year', 'ASC')
            ->orderBy('nummonth', 'ASC')
            ->paginate(5);
    }

    // UPLOAD FILE
    //======================
    public function uploadFile(Request $request)
    {
        $directorio = $request->input("folder");
        $year = $request->input("year");
        $month = $request->input("month");
        $day = $request->input("day");
        $idUser = $request->input("idUser");
        $idCountry = $request->input("idCountry");
        $idSupplier = $request->input("idSupplier");
        $pathImage = $directorio . '/' . $year . '/' . $month . '/';

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $idCountry . '-' . $year . $month . $day . '-' . $idUser . '-' . $idSupplier . '-' . date('His');

            $filename = pathinfo($filename, PATHINFO_FILENAME);
            $name_File = str_replace(" ", "_", $filename);
            $extension = $file->getClientOriginalExtension();
            $picture = $name_File . '.' . $extension;
            $file->move(public_path($pathImage), $picture);
            return  response()->json(["exito" => true, "urlFile" => $pathImage . $picture]);
        } else {

            return  response()->json(["exito" => false, "urlFile" => null]);
        }
    }


    // CREATE
    //======================
    public function create(Request $request)
    {
        //Guarda en BD
        $expense = new Expense();
        //idExpense
        $expense->idCountry = $request->input('idCountry');
        $expense->idUser = $request->input('idUser');
        $expense->idTypeEntry = $request->input('idTypeEntry');
        $expense->idSupplier = $request->input('idSupplier'); //
        $expense->nameSupplier = $request->input('nameSupplier');
        $expense->serieInvoice = $request->input('serieInvoice');
        $expense->dateInvoice = $request->input('dateInvoice');
        $expense->amount = $request->input('amount');
        $expense->image = $request->input('image');
        $expense->state = $request->input('state');
        $expense->save();
        return json_encode(['msg' => 'exito creación']);
    }

    // EDIT
    //======================
    public function updateState(Request $request)
    {
        $expense = Expense::find($request->input('idExpense'));
        $expense->state = $request->input('state');
        $expense->save();

        return json_encode([
            'msg' => 'Modificación con exito',
            'data' => $expense
        ]);
    }

    // EDIT
    //======================
    public function downloadExcel(Request $request)
    {
        return DB::table('expenses')
            ->join('typeentries', 'typeentries.idTypeEntry', '=', 'expenses.idTypeEntry')
            ->join('users', 'users.idUser', '=', 'expenses.idUser')
            ->where("expenses.idCountry", $request->input('idCountry'))
            ->where("expenses.idUser", $request->input('idUser'))
            ->whereBetween('expenses.dateInvoice', array($request->input('dateFirst'), $request->input('dateEnd')))
            ->get();

        /* return DB::table('expenses')
            ->join('typeentries', 'typeentries.idTypeEntry', '=', 'expenses.idTypeEntry')
            ->join('users', 'users.idUser', '=', 'expenses.idUser')
            ->where("expenses.idCountry", $request->input('idCountry'))
            ->where("expenses.idUser", $request->input('idUser'))
            ->whereBetween('expenses.dateInvoice', array($request->input('dateFirst'), $request->input('dateEnd')))
            ->get(); */
    }
}
