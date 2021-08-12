<?php

namespace App\Exports;

use App\Models\Expense;
/* use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping; */
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpensesExport implements FromCollection/* , WithHeadings, WithMapping */
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Expense::all();
    }

    /* public function headings(): array
    {
        return [
            'idExpense',
            'idCountry',
            'idUser',
            'idTypeEntry',
            'idSupplier',
            'nameSupplier',
            'serieInvoice',
            'dateInvoice',
            'amount',
            'image',
            'state',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->idExpense,
            $transaction->idCountry,
            $transaction->idUser,
            $transaction->idTypeEntry,
            $transaction->idSupplier,
            $transaction->nameSupplier,
            $transaction->serieInvoice,
            $transaction->dateInvoice,
            $transaction->amount,
            $transaction->image,
            $transaction->state,
        ];
    } */
}
