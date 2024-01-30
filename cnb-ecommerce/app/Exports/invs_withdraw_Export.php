<?php

namespace App\Exports;

use App\invs_wallet;
use App\invs;
use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DateTime;

class invs_withdraw_Export implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    function __construct($request)
    {
        $this->request = $request;
        // dd($request);
    }

    public function collection()
    {
        $invs_all = invs::select('invs.*', 'shops.shop_name', 'users.name', 'users.surname', 'users.wallet_address')
            ->leftJoin('shops', 'invs.shop_id', '=', 'shops.id')
            ->leftJoin('users', 'invs.user_id', '=', 'users.id')
            // ->leftJoin('transactions', function ($invs_all) {
            //     $invs_all->on('invs.inv_ref', '=', 'transactions.inv_ref')
            //         ->whereIn('transactions.payment', ['wallet cancel', 'withdraw']);
            // })
            ->orderBy('invs.updated_at', 'asc');
        foreach ($_GET as $key => $val) {
            if ($key == 'date_start' and $val != '') {
                $invs_all = $invs_all->where('invs.created_at', '>=', $val . ' 00:00:00');
            } elseif ($key == 'date_end' and $val != '') {
                $invs_all = $invs_all->where('invs.created_at', '<=', $val . ' 23:59:59');
            } elseif ($key == 'status') {
                if ($val == '0') {
                    $invs_all = $invs_all->whereNotIn('invs.status', ['1', '0', '12', '13', '21', '99']);
                } elseif ($val == '1') {
                    $invs_all = $invs_all->where('invs.status', '2');
                } elseif ($val == '2') {
                    $invs_all = $invs_all->whereIn('invs.status', ['3', '4', '43']);
                } elseif ($val == '3') {
                    $invs_all = $invs_all->whereIn('invs.status', ['5', '52', '53']);
                } elseif ($val == '99') {
                    $invs_all = $invs_all->whereIn('invs.status', ['6', '99',]);
                } else {
                    $invs_all = $invs_all->whereNotIn('invs.status', ['1', '0', '12', '13', '21']);
                }
            } elseif ($key == 'shop_name' and $val != '') {
                $invs_all = $invs_all->where('shop_name', 'like', '%' . $val . '%');
            } elseif ($key == 'invs' and $val != '') {
                $invs_all = $invs_all->where('invs.inv_ref', 'like', '%' . $val . '%');
            } elseif ($key == 'u_name' and $val != '') {
                $invs_all = $invs_all->where(DB::raw("CONCAT(name , ' ' , surname)"), 'like', '%' . $val . '%');
            } elseif ($key == 'wallet_address' and $val != '') {
                $invs_all = $invs_all->where('users.wallet_address', 'like', '%' . $val . '%');
            }
        }
        $invs_all = $invs_all->get();

        foreach ($invs_all as $key => $value) {
            if ($value->tran_payment) {
                if ($value->tran_payment == 'wallet cancel') {
                    $invs_all[$key]->tran_payment = 'โอนเข้า Wallet สำเร็จ';
                } elseif ($value->tran_payment == 'wallet cancel') {
                    $invs_all[$key]->tran_payment = 'โอนเงินสำเร็จ';
                } else {
                    $invs_all[$key]->tran_payment = ' - ';
                }
            }
            if ($value->status) {
                if ($value->status == '2') {
                    $invs_all[$key]->status = 'ชำระสินค้าแล้ว';
                } elseif ($value->status == '53') {
                    $invs_all[$key]->status = 'รับสินค้าหน้างานแล้ว';
                } elseif ($value->status == '5') {
                    $invs_all[$key]->status = 'รับสินค้า';
                } elseif ($value->status == '4') {
                    $invs_all[$key]->status = 'สินค้าถึงปลายทางแล้ว';
                } elseif ($value->status == '3') {
                    $invs_all[$key]->status = 'ส่งสินค้าแล้ว';
                } elseif ($value->status == '52') {
                    $invs_all[$key]->status = 'รับสินค้าอัตโนมัติ';
                } elseif ($value->status == '54') {
                    $invs_all[$key]->status = 'ประกาศผลแล้ว';
                } elseif ($value->status == '43') {
                    $invs_all[$key]->status = 'รอรับสินค้าหน้างาน';
                } elseif ($value->status == '99') {
                    $invs_all[$key]->status = 'ยกเลิกสำเร็จ';
                } elseif ($value->status == '6') {
                    $invs_all[$key]->status = 'แจ้งยกเลิก';
                }
            }
            $products='';
            foreach ($value->inv_products as $key2 => $value2) {
                
                $productname=Product::select('name')->where('id',$value2['product_id'])->first();
                
                if (!isset($productname->name)) {
                    $products=$products." "."[".$value2['amount']."] ";
                } else {
                    $products=$products.$productname->name."[".$value2['amount']."] ";
                }
                $invs_all[$key]->inv_products = $products;
                // dd($products);
            }
        }


        // dd($invs_all);
        // $invs_wallet = invs_wallet::whereIn('status', [2])->orderBy('invs_wallet.created_at', 'desc')->get();

        // dd($invs_wallet);
        // return invs_wallet::where('status', 2)->where('payment', 'bank')->orderBy('invs_wallet.created_at', 'desc');
        return $invs_all;
    }

    public function headings(): array
    {
        return [
            'INV Ref',
            'Shop name',
            'Customer name / Wallet Address',
            'Product name',
            'Date',
            'Last modified',
            'Payment',
            'Status',
            'Product price',
            'Ship price',
            'Total',
        ];
    }

    public function map($invs_all): array
    {
        return [
            $invs_all->inv_ref.' ',
            $invs_all->shop_name,
            $invs_all->name . ' ' . $invs_all->surname.' / '.$invs_all->wallet_address,
            $invs_all->inv_products,
            $invs_all->created_at,
            $invs_all->updated_at,
            $invs_all->payment,
            $invs_all->status,
            $invs_all->total,
            $invs_all->shipping_cost,
            $invs_all->shipping_cost + $invs_all->total,
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
