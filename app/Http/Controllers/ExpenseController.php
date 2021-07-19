<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

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
}
