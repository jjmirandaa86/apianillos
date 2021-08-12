<?php

namespace App\Imports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ExpensesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Expense([
            'idExpense' => $row['idExpense'],
            'idCountry' => $row['idCountry'],
            /*  'idUser' => $row['idUser'],
            'idTypeEntry' => $row['idTypeEntry'],
            'idSupplier' => $row['idSupplier'],
            'nameSupplier' => $row['nameSupplier'],
            'serieInvoice' => $row['serieInvoice'],
            'dateInvoice' => $row['dateInvoice'],
            'amount' => $row['amount'],
            'image' => $row['image'],
            'state' => $row['state'], */
        ]);
    }
}
