<?php

namespace App\Exports;

use App\invs_wallet;
use App\invs;
use App\Transactions;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DateTime;

class transaction_Export implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $transacion = Transactions::leftJoin('users', 'transactions.user_id', '=', 'users.id')
                ->select('transactions.*', 'users.name', 'users.surname')
                ->orderBy('transactions.created_at', 'desc');
                $transacion = $transacion->whereIn('transactions.status', [2, 99]);
            foreach ($_GET as $key => $val) {
                if ($key == 'date_start' and $val != '') {
                    $transacion = $transacion->where('transactions.created_at', '>=', $val . ' 00:00:00');
                } elseif ($key == 'date_end' and $val != '') {
                    $transacion = $transacion->where('transactions.created_at', '<=', $val . ' 23:59:59');
                } elseif ($key == 'status' and $val != '') {
                    if ($val == '0') {
                       
                    } elseif(($val == 'wallet')){
                        $transacion = $transacion->where('transactions.inv_ref', 'like', '%' . 'wallet' . '%');
                    } elseif(($val == 'withdraw')){
                        $transacion = $transacion->where('transactions.payment','withdraw');
                    } elseif(($val == 'shopteenii')){
                        $transacion = $transacion->where('transactions.payment','!=','withdraw')->where('transactions.inv_ref', 'not like', '%' . 'wallet' . '%');
                    }
                } elseif ($key == 'shop_name' and $val != '') {
                    $transacion = $transacion->where('shop_name', 'like', '%' . $val . '%');
                } elseif ($key == 'inv_ref' and $val != '') {
                    $transacion = $transacion->where('inv_ref', 'like', '%' . $val . '%');
                } elseif ($key == 'u_name' and $val != '') {
                    $transacion = $transacion->where('users.name', 'like', '%' . $val . '%');
                } elseif ($key == 'amount' and $val != '') {
                    $transacion = $transacion->where('transactions.total', 'like', '%' . $val . '%');
                }
            }
        $transacion = $transacion->get();

        foreach ($transacion as $key => $value) {
            if ($value->status) {
                if ($value == '12') {
                    $transacion[$key] = 'รอการอนุมัติ';
                } elseif ($value->status == '13') {
                    $transacion[$key]->status = 'ปฏิเสธการอนุมัติ';
                } elseif ($value->status == '2') {
                    $transacion[$key]->status = 'อนุมัติสำเร็จ';
                } elseif ($value->status == '3') {
                    $transacion[$key]->status = 'ส่งสินค้าแล้ว';
                } elseif ($value->status == '4') {
                    $transacion[$key]->status = 'สินค้าถึงปลายทางแล้ว';
                } elseif ($value->status == '5') {
                    $transacion[$key]->status = 'รับสินค้า';
                } elseif ($value->status == '43') {
                    $transacion[$key]->status = 'รอรับสินค้าหน้างาน';
                } elseif ($value->status == '52') {
                    $transacion[$key]->status = 'รับสินค้าอัตโนมัติ';
                } elseif ($value->status == '53') {
                    $transacion[$key]->status = 'รับสินค้าหน้างานแล้ว';
                } elseif ($value->status == '54') {
                    $transacion[$key]->status = 'ประกาศผลแล้ว';
                }
            }
        }

        // dd($transacion);

        return $transacion;
    }

    public function headings(): array
    {
        return [
            'วันที่',
            'ชื่อผู้ใช้งาน',
            'จำนวนเงิน',
            'INV_REF',
            'PAYMENT',
            'สถานะ',
        ];
    }

    public function map($transacion): array
    {
        return [
            $transacion->created_at,
            $transacion->name . ' ' . $transacion->surname,
            $transacion->total,
            $transacion->inv_ref.' ',
            $transacion->payment,
            $transacion->status,
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
