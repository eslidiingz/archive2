<?php

namespace App\Exports;

use App\Transactions;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DOMDocument;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromQuery;

class ExportTransaction implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Transactions::all();
    }

    public function map($trans): array
    {
        return [
            $trans->id,
            $trans->uSers[0]->name . '   ' . $trans->uSers[0]->surname,
            $trans->updated_at,
            $trans->total,
            $trans->inv_ref,
            $trans->inv_id['id'],
            $trans->status,



        ];
    }
    public function headings(): array
    {
        return [
            '#', 'User', 'Time', 'Total', 'inv_Ref', 'inv_id', 'status'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
