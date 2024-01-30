<?php

namespace App\Exports;

use App\User;
use App\inv_cancel;
use App\invs;
use App\Shops;
use App\UsersAdmin;
use App\BankMaster;
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

class invs_cancel_customer_detail_export implements FromCollection, WithMapping, ShouldAutoSize, WithColumnFormatting, WithTitle, Withheadings
{
    public $a_withdraw_sts = array( '1' => 'รอดำเนินการ', '2' => 'โอน Wallet', '3' => 'ดำเนินการแล้ว', '99' => 'ถูกยกเลิกแล้ว', '' => '', 0 => '' );

    public function collection()
    {
        // $time_setting = Carbon::now()->format('Y-m-d 23:59');
        $invs_cancel = inv_cancel::select('inv_cancels.*')
                ->leftJoin('invs', 'inv_cancels.inv_id', '=', 'invs.id')
                ->leftJoin('shops', 'inv_cancels.shop_id', '=', 'shops.id')
                ->leftJoin('users', 'inv_cancels.user_id', '=', 'users.id')
                ->where('invs.cancel_by','=','CUSTOMER')
                ->orderBy('inv_cancels.created_at', 'desc');

        foreach ($_GET as $key => $val) {
            if ($key == 'date_start' and $val != '') {
                $invs_cancel = $invs_cancel->where('inv_cancels.created_at', '>=', $val . ' 00:00:00');
            } elseif ($key == 'date_end' and $val != '') {
                $invs_cancel = $invs_cancel->where('inv_cancels.created_at', '<=', $val . ' 23:59:59');
            } elseif ($key == 'status' and $val != '') {
                if ($val == '0') {
                    $invs_cancel = $invs_cancel->whereIn('inv_cancels.status', [0, 2, 99]);
                } elseif ($val == '1') {
                    $invs_cancel = $invs_cancel->whereIn('inv_cancels.status', [0, 1]);
                } else {
                    $invs_cancel = $invs_cancel->where('inv_cancels.status', $val);
                }
            } elseif ($key == 'shop_name' and $val != '') {
                $invs_cancel = $invs_cancel->where('shop_name', 'like', '%' . $val . '%');
            } elseif ($key == 'invs' and $val != '') {
                $invs_cancel = $invs_cancel->where('inv_ref', 'like', '%' . $val . '%');
            } elseif ($key == 'u_name' and $val != '') {
                $invs_cancel = $invs_cancel->where('users.name', 'like', '%' . $val . '%');
            }
        }
        $invs_cancel = $invs_cancel->get();
        // dd($invs_cancel);
        foreach ($invs_cancel as $key => $value) {
            $inv_data = invs::where('id', $value->inv_id)->first();
            $user_data = User::where('id', $value->user_id)->first();
            $shop_data = Shops::where('id', $value->shop_id)->first();
            $invs_cancel[$key]->logs = $value->logs_OrderCancel_Case->first();
            if ($inv_data) {
                $invs_cancel[$key]->inv_ref = $inv_data->inv_ref;
                $invs_cancel[$key]->sum_total = $inv_data->total + $inv_data->shipping_cost;
                $invs_cancel[$key]->total = $inv_data->total;
                $invs_cancel[$key]->shipping_cost = $inv_data->shipping_cost;
                $invs_cancel[$key]->shop_id = $inv_data->shop_id;
            }
            if ($user_data) {
                $invs_cancel[$key]->user_name = $user_data->name;
                $invs_cancel[$key]->user_phone = $user_data->phone;
                if($user_data->bank_id){
                    $bank = BankMaster::where('id',$user_data->bank_id)->first();
                    $invs_cancel[$key]->user_bank = $bank->name;
                    $invs_cancel[$key]->user_bankLogo = $bank->logo;
                    $invs_cancel[$key]->user_bankName = $user_data->bank_name;
                    $invs_cancel[$key]->user_bankNumber = $user_data->bank_number;
                    $invs_cancel[$key]->user_bankCategory = $user_data->bank_category;
                }
            }
            if ($shop_data) {
                $invs_cancel[$key]->shop_name = $shop_data->shop_name;
            }
            $invs_cancel[$key]->approve_name = '';
            if (isset($invs_cancel[$key]->logs)) {
                $invs_cancel[$key]->approve_user = UsersAdmin::where('id', $invs_cancel[$key]->logs->user_id)->first();
                $invs_cancel[$key]->approve_name = $invs_cancel[$key]->approve_user->name.' ('.$invs_cancel[$key]->approve_user->username.')';
            }

            if($value->user_approve == 1){
                $value->approve_by = $user_data->name;
            }
        }
        // dd($user_withdraw[0]->user->phone);

        return $invs_cancel;
    }

    public function headings(): array
    {
        return [
            'วันที่',
            'ผู้ซื้อ',
            'ร้านค้า',
            'เลขกำกับคำสั่งซื้อ',
            'ยกเลิกโดย',
            'ราคาสินค้าทั้งหมด',
            'ค่าขนส่งทั้งหมด',
            'รวม',
            'เหตุผลการยกเลิก',
            'บันทึกข้อความจาก Admin',
            'ธนาคาร',
            'เลขที่บัญชี',
            'สถานะ',
            'ผู้ดำเนินการ'
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
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_TEXT,
            'F' => NumberFormat::FORMAT_NUMBER,
            'G' => NumberFormat::FORMAT_NUMBER,
            'H' => NumberFormat::FORMAT_NUMBER,
            'I' => NumberFormat::FORMAT_TEXT,
            'J' => NumberFormat::FORMAT_TEXT,
            'K' => NumberFormat::FORMAT_TEXT,
            'L' => NumberFormat::FORMAT_TEXT,
            'M' => NumberFormat::FORMAT_TEXT,
            'N' => NumberFormat::FORMAT_TEXT
        ];
    }



    public function map($map_data): array
    {
        $s_sts_name = '';
        if($map_data->status == '0') {
            $s_sts_name = 'รอตรวจสอบ';
        } elseif ($map_data->status == '99') {
            $s_sts_name = 'ปิดเคส';
        } elseif ($map_data->status == '1') {
            $s_sts_name = 'อยู่ระหว่างรอตรวจสอบ';
        } elseif ($map_data->status == '2') {
            $s_sts_name = 'ตรวจสอบแล้ว';
        } else {
            $s_sts_name = 'อนุมัติสำเร็จ';
        }

        return [
            date('d/m/y H:i', strtotime($map_data->created_at)),
            $map_data->user_name,
            $map_data->shop_name,
            $map_data->inv_ref,
            $map_data->approve_by ?? '-',
            number_format($map_data->total,2),
            number_format($map_data->shipping_cost,2),
            number_format($map_data->sum_total,2),
            $map_data->description,
            $map_data->admin_note,
            $map_data->user_bankName,
            $map_data->user_bankCategory.' : '.$map_data->user_bankNumber,
            $s_sts_name,
            $map_data->approve_name
            // Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}
