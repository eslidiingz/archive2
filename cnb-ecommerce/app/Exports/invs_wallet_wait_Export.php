<?php

namespace App\Exports;

use App\invs_wallet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DateTime;

class invs_wallet_wait_Export implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        $invs_wallet = invs_wallet::whereIn('status', [12])->where('payment', 'bank')->orderBy('invs_wallet.created_at', 'desc')->get();
        foreach ($invs_wallet as $key => $value) {
            $invs_wallet[$key]->user = $value->users->first();
            if ($value->status == 12) {
                $value->status =   'รอการอนุมัติ';
            } elseif ($value->status == 99) {
                $value->status =   'ปฏิเสธการอนุมัติ';
            } elseif ($value->status == 2) {
                $value->status =   'อนุมัติสำเร็จ';
            } else {
                $value->status =   'รอการชำระ';
            }
        }
        // dd($invs_wallet);
        // return invs_wallet::where('status', 2)->where('payment', 'bank')->orderBy('invs_wallet.created_at', 'desc');
        return $invs_wallet;
    }

    public function headings(): array
    {
        return [
            'วันที่',
            'ชื่อผู้ใช้งาน',
            'จำนวนเงิน',
            'INV_REF',
            'สถานะ',
        ];
    }

    public function map($invs_wallet): array
    {
        return [
            $invs_wallet->created_at,
            $invs_wallet->user->name . ' ' . $invs_wallet->user->surname,
            $invs_wallet->total,
            $invs_wallet->inv_ref,
            $invs_wallet->status,
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
