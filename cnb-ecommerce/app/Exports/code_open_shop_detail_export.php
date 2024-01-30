<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\User;
use App\Invs;
use App\Shops;
use App\CodeOpenShop;
use App\CodeOpenShopGen;
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

class code_open_shop_detail_export implements FromCollection, WithMapping, ShouldAutoSize, WithColumnFormatting, WithTitle, Withheadings
{
    protected $id;
    protected $o_code_open_shop_gen;
    protected $o_code_open_shop;

    function __construct($id) {
        $this->id = $id;

        $this->o_code_open_shop_gen = CodeOpenShopGen::where('id', $this->id)->first();
        $this->o_code_open_shop = CodeOpenShop::where('gen_id', $this->id)->get();
    }

    public function collection()
    {
        // $time_setting = Carbon::now()->format('Y-m-d 23:59');
        

        return $this->o_code_open_shop;
    }

    public function headings(): array
    {
        $a_head = array(
            array('Code เปิดร้านค้า','','','',''),
            array('รายละเอียด',$this->o_code_open_shop_gen->detail,'','',''),
            array('จำนวนโค้ด',$this->o_code_open_shop_gen->code_amt,'ใช้ไปแล้ว',$this->o_code_open_shop_gen->code_amt-$this->o_code_open_shop_gen->remain_amt,'คงเหลือ',$this->o_code_open_shop_gen->remain_amt),
            array('','','','',''),
            array('Code','จำนวน','ใช้ไปแล้ว','ชื่อร้านค้า','วัน-เวลาที่ใช้ Code')
        );
        return $a_head;
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
            'E' => NumberFormat::FORMAT_TEXT
        ];
    }

    public function map($code_list): array
    {
        // dd($code);
        return [
            $code_list->code,
            $code_list->code_amt,
            $code_list->code_amt-$code_list->remain_amt,
            $code_list->used_shop_name,
            ($code_list->used_at) ? date('d/m/y H:i', strtotime($code_list->used_at)) : '',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }

    /*public function map($map_data): array
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
    }*/
}
