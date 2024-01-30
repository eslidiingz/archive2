<?php

namespace App\Exports;

use App\User;
use App\Shops;
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

class ExportUsers implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings, WithEvents
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Shops::whereIn('approve_shop',['waiting', 'approve'])->get();
        foreach($data as $key => $value){
            $getuser = $value->UseRs;
            foreach($getuser as $loopuser){
                $data[$key]->user = $loopuser;
            }
        }
        return $data;
    }

    public function map($trans): array
    {
        // dd($trans);
        return [
            $trans->user->id,
            $trans->shop_name,
            $trans->user->name.' '.$trans->user->surname,
            $trans->user->phone,
            $trans->user->email,
        ];
    }
    public function headings(): array
    {
        return [
            'uid', 'Shop name', 'Name', 'Phone', 'Email'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
