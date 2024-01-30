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

class invs_detail_Export implements FromCollection, WithMapping, ShouldAutoSize, WithColumnFormatting, WithTitle, Withheadings
{
    public $a_withdraw_sts = array( '1' => 'รอดำเนินการ', '2' => 'โอน Wallet', '3' => 'ดำเนินการแล้ว', '99' => 'ถูกยกเลิกแล้ว', '' => '', 0 => '' );

    public function collection()
    {
        $time_setting = Carbon::now()->format('Y-m-d 23:59');
        $user_withdraw = withdrow::whereNotIn('status', ['0'])
            ->leftJoin('shops', 'withdrows.shop_id', '=', 'shops.id')
            ->selectRaw('withdrows.*,shops.shop_name, sum(amount) as sum')
            ->where('withdrows.bank_code', '!=', '')
            ->where('withdrows.created_at', '<', $time_setting)
            ->orderBy('withdrows.created_at', 'desc')
            ->groupBy('withdrows.account_date','withdrows.shop_id','shops.shop_name','withdrows.type','withdrows.note')
            ->get();
// echo $user_withdraw; exit;
        foreach ($user_withdraw as $key => $value) {
            $user_withdraw[$key]->key = sprintf("%06d", $key + 1);
            $user_withdraw[$key]->shop = $value->Shops->first();
            $user_withdraw[$key]->inv = $value->invs->first();
            $user_withdraw[$key]->user = $value->User->first();

            if ($user_withdraw[$key]->inv->status == '2') {
                $user_withdraw[$key]->inv->status = 'ชำระสินค้าแล้ว';
            } elseif ($user_withdraw[$key]->inv->status == '53') {
                $user_withdraw[$key]->inv->status = 'รับสินค้าหน้างานแล้ว';
            } elseif ($user_withdraw[$key]->inv->status == '5') {
                $user_withdraw[$key]->inv->status = 'รับสินค้า';
            } elseif ($user_withdraw[$key]->inv->status == '4') {
                $user_withdraw[$key]->inv->status = 'สินค้าถึงปลายทางแล้ว';
            } elseif ($user_withdraw[$key]->inv->status == '3') {
                $user_withdraw[$key]->inv->status = 'ส่งสินค้าแล้ว';
            } elseif ($user_withdraw[$key]->inv->status == '52') {
                $user_withdraw[$key]->inv->status = 'รับสินค้าอัตโนมัติ';
            } elseif ($user_withdraw[$key]->inv->status == '54') {
                $user_withdraw[$key]->inv->status = 'ประกาศผลแล้ว';
            } elseif ($user_withdraw[$key]->inv->status == '43') {
                $user_withdraw[$key]->inv->status = 'รอรับสินค้าหน้างาน';
            } elseif ($user_withdraw[$key]->inv->status == '99') {
                $user_withdraw[$key]->inv->status = 'ยกเลิกสำเร็จ';
            } elseif ($user_withdraw[$key]->inv->status == '6') {
                $user_withdraw[$key]->inv->status = 'แจ้งยกเลิก';
            }
        }
        // dd($user_withdraw[0]->user->phone);

        return $user_withdraw;
    }

    public function headings(): array
    {
        return [
            'เลขกำกับคำสั่งซื้อ',
            'ชื่อร้านค้า',
            'ผู้เบิก',
            'วันที่สั่งซื้อ',
            'ค่าสินค้า',
            'ค่าขนส่ง',
            'รวม',
            'สถานะคำสั่งซื้อ',
            'สถานะการถอนเงิน',
            'ประเภทการถอน',
            'จำนวนเงินที่ต้องการถอน',
            'ชื่อบัญชี',
            'เลขที่บัญชี',
            'ธนาคาร',
            'Wallet Address'
        ];
    }

    public function title(): string
    {
        return 'Detail';
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
            $user_withdraw->inv->inv_ref.' ',
            $user_withdraw->shop_name,
            $user_withdraw->user->name . ' ' . $user_withdraw->user->surname,
            $user_withdraw->inv->created_at,
            $user_withdraw->inv->total,
            $user_withdraw->inv->shipping_cost,
            ($user_withdraw->inv->total) + ($user_withdraw->inv->shipping_cost),
            $user_withdraw->inv->status,
            $this->a_withdraw_sts[$user_withdraw->status],
            $user_withdraw->type,
            ($user_withdraw->type=='Crypto') ? 'USDC '.$user_withdraw->usdc : '฿ '.$user_withdraw->amount,
            ($user_withdraw->type=='Crypto') ? '' : $user_withdraw->bank_name,
            ($user_withdraw->type=='Crypto') ? '' : $user_withdraw->bank_number,
            ($user_withdraw->type=='Crypto') ? '' : $user_withdraw->bank_code,
            ($user_withdraw->type=='Crypto') ? $user_withdraw->user->wallet_address : '',

            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
