<?php

namespace App\Exports;

use App\invs_wallet;
use App\invs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DateTime;

class invs_approvepayment_Export implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    function __construct($request)
    {
        $this->request = $request;
        // dd($request);
    }

    public function collection()
    {
        $invs = invs::whereIn('invs.payment', ['bank', 'mobilebanking', 'credit'])
            ->leftJoin('users', 'invs.user_id', '=', 'users.id')
            ->leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
            ->leftJoin('users as shop_user', 'shops.user_id', '=', 'shop_user.id')
            ->select('invs.*', 'users.name', 'users.surname', 'users.phone as user_phone', 'shops.shop_name', 'shop_user.phone as shop_user_phone')
            ->orderBy('invs.created_at', 'desc');
        foreach ($_GET as $key => $val) {
            if ($key == 'u_name' and $val != '') {
                $invs = $invs
                    ->where(function ($q) use ($val) {
                        $q->where('users.name', 'like', '%' . $val . '%')
                            ->orwhere('users.surname', 'like', '%' . $val . '%');
                    });
            } elseif ($key == 'amount' and $val != '') {
                $invs = $invs->where(\DB::raw('invs.total + shipping_cost'), 'like', '%' . $val . '%');
            } elseif ($key == 'date_start' and $val != '') {
                $invs = $invs->where('invs.created_at', '>=', $val . ' 00:00:00');
            } elseif ($key == 'date_end' and $val != '') {
                $invs = $invs->where('invs.created_at', '<=', $val . ' 23:59:59');
            } elseif ($key == 'status' and $val != '') {
                if ($val == '0') {
                    $invs = $invs->whereIn('invs.status', [12, 2, 13, 3, 4, 5, 43, 52, 53, 54]);
                } elseif ($val == '33') {
                    $invs = $invs->whereIn('invs.status', [3, 4, 43]);
                } elseif ($val == '55') {
                    $invs = $invs->whereIn('invs.status', [5, 52, 53, 54]);
                } else {
                    $invs = $invs->where('invs.status', $val);
                }
            } elseif ($key == 'inv_ref' and $val != '') {
                $invs = $invs->where('invs.inv_ref', 'like', '%' . $val . '%');
            }
        }
        $invs = $invs->get();

        foreach ($invs as $key => $value) {
            if ($value->status) {
                if ($value == '2') {
                    $invs[$key] = 'ชำระสินค้าแล้ว';
                } elseif ($value->status == '53') {
                    $invs[$key]->status = 'รับสินค้าหน้างานแล้ว';
                } elseif ($value->status == '5') {
                    $invs[$key]->status = 'รับสินค้า';
                } elseif ($value->status == '4') {
                    $invs[$key]->status = 'สินค้าถึงปลายทางแล้ว';
                } elseif ($value->status == '3') {
                    $invs[$key]->status = 'ส่งสินค้าแล้ว';
                } elseif ($value->status == '52') {
                    $invs[$key]->status = 'รับสินค้าอัตโนมัติ';
                } elseif ($value->status == '54') {
                    $invs[$key]->status = 'ประกาศผลแล้ว';
                } elseif ($value->status == '43') {
                    $invs[$key]->status = 'รอรับสินค้าหน้างาน';
                } elseif ($value->status == '99') {
                    $invs[$key]->status = 'ยกเลิกสำเร็จ';
                } elseif ($value->status == '6') {
                    $invs[$key]->status = 'แจ้งยกเลิก';
                }
            }
        }

        // dd($invs_all);
        // $invs_wallet = invs_wallet::whereIn('status', [2])->orderBy('invs_wallet.created_at', 'desc')->get();

        // dd($invs_wallet);
        // return invs_wallet::where('status', 2)->where('payment', 'bank')->orderBy('invs_wallet.created_at', 'desc');
        return $invs;
    }

    public function headings(): array
    {
        return [
            'วันที่',
            'ชื่อผู้ใช้งาน',
            'โทร',
            'ชื่อร้านค้า',
            'โทร',
            'จำนวนเงิน',
            'INV_REF',
            'PAYMENT',
            'สถานะ',
        ];
    }

    public function map($invs): array
    {
        return [
            $invs->created_at,
            $invs->name . ' ' . $invs->surname,
            $invs->user_phone.' ',
            $invs->shop_name,
            $invs->shop_user_phone,
            $invs->shipping_cost + $invs->total,
            $invs->inv_ref.' ',
            $invs->payment,
            $invs->status,
        ];
    }
}
