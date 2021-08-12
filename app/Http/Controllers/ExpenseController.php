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

    // CREATE
    //======================
    public function create(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/expensive/');
            return  $name;
        }
        /* $saveFile = false;
        //Sube el archivo al servidor
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();

            $fileName = pathinfo($fileName, PATHINFO_FILENAME);
            $name_file = str_replace(" ", "_", $fileName);

            $extension = $file->getClientOriginalExtension();

            $picture = date('His') . '-' . $fileName . '.' . $extension;
            $file->move(public_path('Expensive/'), $picture);

            $saveFile = true;
        }

        if ($saveFile) {
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
        } else {
            return json_encode(['msg' => 'Error en la creación, archivo no se pudo almacenar.']);
        } */

        return $request;
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
