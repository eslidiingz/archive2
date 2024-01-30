<?php

namespace App\Exports;

use Illuminate\Http\Request;
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

class code_open_shop_export implements WithMultipleSheets
{
	protected $id;

	function __construct($id) {
		$this->id = $id;
	}

    public function sheets(): array
    {
    	return [
            // 'Other Bank' => new invs_inprocess_Export(),
            // 'SCB Bank' => new invs_inprocess_scb_Export(),
            'CodeOpenShop' => new code_open_shop_detail_export($this->id),
        ];
    }
}
