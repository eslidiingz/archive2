<?php

namespace App\Exports;

use App\invs_wallet;
use App\withdrow;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use DateTime;

class invs_inprocess_Export implements FromCollection, WithMapping, ShouldAutoSize, WithColumnFormatting, WithTitle
{
    public function collection()
    {
        $time_setting = Carbon::now()->format('Y-m-d 12:00');
        $user_withdraw = withdrow::where('status', '1')
            ->leftJoin('shops', 'withdrows.shop_id', '=', 'shops.id')
            ->selectRaw('withdrows.*,shops.shop_name, sum(amount) as sum')
            ->where('withdrows.bank_code', '!=', 'ธนาคารไทยพาณิชย์')
            ->where('withdrows.created_at', '<', $time_setting)
            ->orderBy('withdrows.created_at', 'desc')
            ->groupBy('withdrows.shop_id')
            ->get();
        // dd($user_withdraw);
        foreach ($user_withdraw as $key => $value) {
            $user_withdraw[$key]->key = sprintf("%06d", $key + 1);
            $user_withdraw[$key]->shop = $value->Shops->first();
            $user_withdraw[$key]->inv = $value->invs->first();
            $user_withdraw[$key]->user = $value->User->first();
        }
        // dd($user_withdraw);
        // dd($user_withdraw[0]->user->phone);

        return $user_withdraw;
    }

    public function title(): string
    {
        return 'Other Bank';
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_TEXT,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_NUMBER,
            'E' => NumberFormat::FORMAT_TEXT,
            'G' => NumberFormat::FORMAT_NUMBER,
        ];
    }



    public function map($user_withdraw): array
    {
        return [
            $user_withdraw->key,
            $user_withdraw->bank_code,
            '0000',
            $user_withdraw->bank_number,
            '',
            '',
            $user_withdraw->bank_name,
            $user_withdraw->sum,
            'Sender charge',
            '',
            '',
            $user_withdraw->user->phone,
            '',
            '',
            'jitima.k@mip.co.th,' . $user_withdraw->user->email,
            '',
            '',
            '',
            '',
            $user_withdraw->inv->inv_ref,
            $user_withdraw->shop_name,

            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
