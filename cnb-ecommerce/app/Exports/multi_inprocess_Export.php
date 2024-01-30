<?php

namespace App\Exports;

use App\invs_wallet;
use App\withdrow;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use DateTime;

class multi_inprocess_Export implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            // 'Other Bank' => new invs_inprocess_Export(),
            // 'SCB Bank' => new invs_inprocess_scb_Export(),
            'Detail' => new invs_detail_Export(),
        ];
    }
}
