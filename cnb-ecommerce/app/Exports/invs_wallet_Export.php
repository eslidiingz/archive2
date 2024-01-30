<?php

namespace App\Exports;

use App\invs_wallet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DateTime;

class invs_wallet_Export implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $invs_wallet = invs_wallet::leftJoin('users', 'invs_wallet.user_id', '=', 'users.id')
            ->select('invs_wallet.*')
            ->orderBy('invs_wallet.created_at', 'desc');
        foreach ($_GET as $key => $val) {
            if ($key == 'u_name' and $val != '') {
                $invs_wallet = $invs_wallet
                    ->where(function ($q) use ($val) {
                        $q->where('users.name', 'like', '%' . $val . '%')
                            ->orwhere('users.surname', 'like', '%' . $val . '%');
                    });
            } elseif ($key == 'amount' and $val != '') {
                $invs_wallet = $invs_wallet->where('invs_wallet.total', 'like', '%' . $val . '%');
            } elseif ($key == 'date_start' and $val != '') {
                $invs_wallet = $invs_wallet->where('invs_wallet.created_at', '>=', $val . ' 00:00:00');
            } elseif ($key == 'date_end' and $val != '') {
                $invs_wallet = $invs_wallet->where('invs_wallet.created_at', '<=', $val . ' 23:59:59');
            } elseif ($key == 'status') {
                if ($val == '0' or $val == '') {
                    $invs_wallet = $invs_wallet->whereIn('invs_wallet.status', [12, 2, 99]);
                } else {
                    $invs_wallet = $invs_wallet->where('invs_wallet.status', $val);
                }
            } elseif ($key == 'inv_ref' and $val != '') {
                $invs_wallet = $invs_wallet->where('invs_wallet.inv_ref', 'like', '%' . $val . '%');
            }
        }
        $invs_wallet = $invs_wallet->get();
        // $invs_wallet = invs_wallet::whereIn('status', [2])->orderBy('invs_wallet.created_at', 'desc')->get();

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

            if ($value->payment == 'bank') {
                $value->payment =   'โอน';
            } elseif ($value->payment == 'mobilebanking') {
                $value->payment =   'QR CODE';
            } else {
                $value->payment =   'credit';
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
            'สถานะ',
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
            $invs_wallet->payment,
            $invs_wallet->inv_ref,
            $invs_wallet->status,
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
