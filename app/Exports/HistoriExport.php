<?php

namespace App\Exports;

use App\Models\PembayaranView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class HistoriExport implements FromView
{
   
    use Exportable;

    public function view(): View
    {
        return view('excel.histori', [
           'views' => PembayaranView::all()
        ]);
    }
}
