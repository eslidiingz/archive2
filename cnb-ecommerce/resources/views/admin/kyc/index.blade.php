@extends('layouts.dashboard')

<style>
    .dropdownHover {
        text-decoration: none;
    }
    .dropdownHover:hover {
        text-decoration: underline !important;
    }
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #346751;
        border-color: #346751;
    }
</style>

@section('content')
    <div class="p-0">
        <div class="row py-4">
            <div class="col-12">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row flex-md-row">
                        <div class="">
                            <h5 class="mb-0"><b>ระบบจัดการยืนยันตัวตนร้านค้า</b></h5>
                        </div>
                        <form class="flex-fill d-flex flex-column flex-md-row justify-content-end">
                            <div class="d-flex my-lg-0 my-md-0 my-2">
                                <input type="text" name="txtSearch" value="{{$request->txtSearch}}" placeholder="ค้นหา" class="form-control ml-auto" style="max-width: 480px;">
                                <button type="submit" class="form-control btn  ml-3 btn-main-set">ค้นหา</button>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <a href="/dashboard/kyc"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                            </div>
                        </form>
                    </div>
                    {{-- {{dd($users)}} --}}
                    <div class="col-12 p-0">
                        <table class="table table-borderless table-striped table-sm-responsive">
                            <thead class="thead-blue">
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ร้านค้า</th>
                                    <th>เลขบัญชี</th>
                                    <th>ประเภทการยืนยัน</th>
                                    <th>สถานะ</th>
                                    <th>จัดการโดย</th>
                                    <th>อัปเดตเมื่อ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kyc_admin as $key => $value)
                                    <tr>
                                        <td data-label="Action">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ url('dashboard/kyc/edit', $value->id) }}"
                                                        class="dropdown-item btn btn-sm btn-info">แก้ไข</a>

                                                    <a type="button" class="dropdown-item btn btn-sm btn-danger"
                                                        data-toggle="modal" data-target="#deleteModal{{ $value->id }}">
                                                        ลบ
                                                    </a>
                                                </div>
                                                <form style="display: inline" role="form"
                                                    action="{{ url('dashboard/kyc/destroy') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                    <div class="modal fade" id="deleteModal{{ $value->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        ลบการยืนยันตัวตน #{{ $value->title }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <div class="mb-3">
                                                                        คุณต้องการจะลบการยืนยันตัวตนนี้ใช่หรือไม่?
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-success">ยืนยัน</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">ยกเลิก</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                        <td data-label="#">
                                            {{ $kyc_admin->perPage() * ($kyc_admin->currentPage() - 1) + $key + 1 }}
                                        </td>
                                        <td data-label="ชื่อ-นามสกุล">{{ $value->user->name }}
                                            {{ $value->user->surname }}</td>
                                        <td data-label="ชื่อ-นามสกุล">{{ $value->shop_name }}</td>
                                        <td data-label="เลขบัญชี">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle dropdownHover" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ $value->bank_number ? $value->bank_number : "" }} &nbsp;<span><i class="fas fa-chevron-down"></i></span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <div class="container">
                                                        <p>เลขบัญชี:<br>{{ $value->bank_number ? $value->bank_number : "" }}
                                                            <br><br>
                                                            ชื่อธนาคาร:<br>{{ $value->bank_code ? $value->bank_code : "" }}
                                                            <br><br>
                                                            ชื่อบัญชี:<br>{{ $value->bank_name ? $value->bank_name : "" }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="ประเภทการยืนยัน">
                                            @if ($value->type_kyc == 1)
                                                นิติบุคคลทั่วไป
                                            @elseif ($value->type_kyc == 3)
                                                บุคคลทั่วไป
                                            @else
                                                นิติบุคคล (ที่เกี่ยวกับเครื่องมือแพทย์)
                                            @endif
                                        </td>
                                        <td data-label="สถานะ">

                                            @php
                                                $sum = $i_sum_wait = 0;
                                                $total = 2;
                                                $sum += $value->status_first == 1 ? 1 : 0;
                                                $sum += $value->status_second == 1 ? 1 : 0;

                                                $s_txt_style = '';
                                                $s_txt_msg = '';

                                                $i_sum_wait += $value->status_first == 2 ? 1 : 0;
                                                $i_sum_wait += $value->status_second == 2 ? 1 : 0;

                                                if ($value->type_kyc == 1) {
                                                    $total = 3;
                                                    $i_sum_wait += $value->status_fifth == 2 ? 1 : 0;
                                                    $sum += $value->status_fifth == 1 ? 1 : 0;

                                                    if ($value->status_first == 3 || $value->status_second == 3 || $value->status_fifth == 3) {
                                                        $s_txt_style = 'danger';
                                                        $s_txt_msg = 'พบข้อมูลไม่ถูกต้อง';
                                                    } elseif( $sum == 0 ) {
                                                        if( $i_sum_wait > 0 ) {
                                                            $s_txt_style = 'primary';
                                                            $s_txt_msg = 'รอตรวจสอบ';
                                                        } else {
                                                            $s_txt_style = 'danger';
                                                            $s_txt_msg = 'ยังไม่ได้ยืนยันตน';
                                                        }
                                                    } else {
                                                        if( $sum == $total ) {
                                                            $s_txt_style = 'success';
                                                            $s_txt_msg = 'ยืนยันตนเรียบร้อย';
                                                        } else {
                                                            $s_txt_style = 'warning';
                                                            $s_txt_msg = 'กำลังดำเนินการ';
                                                        }
                                                    }
                                                } elseif ($value->type_kyc == 3) {
                                                    $total = 2;

                                                    if ($value->status_first == 3 || $value->status_second == 3) {
                                                        $s_txt_style = 'danger';
                                                        $s_txt_msg = 'พบข้อมูลไม่ถูกต้อง';
                                                    } elseif( $sum == 0 ) {
                                                        if( $i_sum_wait > 0 ) {
                                                            $s_txt_style = 'primary';
                                                            $s_txt_msg = 'รอตรวจสอบ';
                                                        } else {
                                                            $s_txt_style = 'danger';
                                                            $s_txt_msg = 'ยังไม่ได้ยืนยันตน';
                                                        }
                                                    } else {
                                                        if( $sum == $total ) {
                                                            $s_txt_style = 'success';
                                                            $s_txt_msg = 'ยืนยันตนเรียบร้อย';
                                                        } else {
                                                            $s_txt_style = 'warning';
                                                            $s_txt_msg = 'กำลังดำเนินการ';
                                                        }
                                                    }
                                                } elseif ($value->type_kyc == 2) {
                                                    $total = 5;
                                                    $sum += $value->status_third == 1 ? 1 : 0;
                                                    $sum += $value->status_fourth == 1 ? 1 : 0;
                                                    $sum += $value->status_fifth == 1 ? 1 : 0;

                                                    $i_sum_wait += $value->status_third == 2 ? 1 : 0;
                                                    $i_sum_wait += $value->status_fourth == 2 ? 1 : 0;
                                                    $i_sum_wait += $value->status_fifth == 2 ? 1 : 0;

                                                    if ($value->status_first == 3 || $value->status_second == 3 || $value->status_third == 3 || $value->status_fourth == 3 || $value->status_fifth == 3) {
                                                        $s_txt_style = 'danger';
                                                        $s_txt_msg = 'พบข้อมูลไม่ถูกต้อง';
                                                    } elseif( $sum == 0 ) {
                                                        if( $i_sum_wait > 0 ) {
                                                            $s_txt_style = 'primary';
                                                            $s_txt_msg = 'รอตรวจสอบ';
                                                        } else {
                                                            $s_txt_style = 'danger';
                                                            $s_txt_msg = 'ยังไม่ได้ยืนยันตน';
                                                        }
                                                    } else {
                                                        if( $sum == $total ) {
                                                            $s_txt_style = 'success';
                                                            $s_txt_msg = 'ยืนยันตนเรียบร้อย';
                                                        } else {
                                                            $s_txt_style = 'warning';
                                                            $s_txt_msg = 'กำลังดำเนินการ';
                                                        }
                                                    }
                                                }
                                            @endphp
                                            
                                                <span class="text-{{$s_txt_style}}">
                                                    <b><!--{{ $sum }}/{{ $total }} | -->{{$s_txt_msg}}</b>
                                                </span>
                                            
                                        </td>
                                        <td data-label="ชื่อแอดมิน">
                                            {{ isset($value->admin->name) ? $value->admin->name.' '.$value->admin->surname : '-' }}</td>
                                        <td data-label="อัปเดตเมื่อ">{{ $value->updated_at }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        @if (count($kyc_admin) == 0)
                            <label for="" class="text-danger">ไม่พบข้อมูล</label>
                        @endif
                    </div>
                    <div>
                        {{ $kyc_admin->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<style type="text/css" scoped>
    tr td .dropdown-toggle::after {
        display: none;
    }

</style>
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
