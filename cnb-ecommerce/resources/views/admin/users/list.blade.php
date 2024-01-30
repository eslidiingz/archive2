@extends('layouts.dashboard')

@section('content')
<!-- <div class="container"> -->
<div class="container-fluid px-0">
    <div class="row py-4">
        <div class="col-12">
            <div class="card p-4" style="border-radius: 15px;">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row flex-md-row">
                    <div class=""><h5 class="mb-0"><b>ระบบจัดการแอดมิน</b></h5></div>
                    <form class="flex-fill d-flex flex-column flex-md-row justify-content-end">
                        <div class="d-flex my-lg-0 my-md-0 my-2">
                            <input type="text" name="txtSearch" value="{{$request->txtSearch}}" placeholder="ค้นหา" class="form-control ml-auto" style="max-width: 480px;">
                            <button type="submit" class="form-control btn ml-3 btn-main-set">ค้นหา</button>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12 mb-2">
                            <a href="/dashboard/admin"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                        </div>
                        @if (Auth::guard('admin')->user()->type == 'superadmin')
                        <a href="{{ url('dashboard/admin/create') }}"><input type="button" value="เพิ่มผู้ใช้งาน" class="form-control btn btn-main-set"></a>
                        @endif
                    </form>
                </div>
                <div class="col-12 p-0">
                    <table class="table table-borderless table-striped table-sm-responsive">
                        <thead class="thead-blued">
                            <tr>
                                <th style="min-width: 80px">Action</th>
                                <th>#</th>
                                <th>รูปภาพ</th>
                                <th style="min-width: 200px">ชื่อผู้ใช้งาน</th>
                                <th style="min-width: 200px">ชื่อ - นามสกุล</th>
                                <th style="min-width: 200px">อีเมล</th>
                                <th>ประเภท</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $value)
                                <tr>
                                    <td data-label="Action" style="vertical-align: middle;">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-pink dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item btn btn-sm btn-outline" href="/dashboard/admin/edit/{{ $value->id }}">แก้ไข</a>
                                                <a class="dropdown-item btn btn-sm btn-outline" href="#">ลบ</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="#" style="vertical-align: middle;">{{ ($users->perPage()*($users->currentPage()-1))+$key+1 }}</td>
                                    <td data-label="รูปภาพ" style="vertical-align: middle;"><img src=""></td>
                                    <td data-label="ชื่อผู้ใช้งาน" style="vertical-align: middle;">{{ @$value->username }}</td>
                                    <td data-label="ชื่อ - นามสกุล" style="vertical-align: middle;">{{ @$value->name }} {{ @$value->surname }}</td>
                                    <td data-label="อีเมล" class="text-left" style="vertical-align: middle;">{{ @$value->email }}</td>
                                    <td data-label="ประเภท" style="vertical-align: middle;">{{ @$value->type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css" scoped>
    tr td .dropdown-toggle::after{
        display: none;
    }
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #346751;
        border-color: #346751;
        border-radius: 10rem;
        font-size: 10px;
        margin: 3px;
    }
    .page-link {
        position: relative;
        display: block;
        padding: 0.5rem 0.75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #346751;
        border-radius: 10rem;
        font-size: 10px;
        margin: 3px;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }
    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        display: none;
    }
    .text-gray-700 {
        color: #6e707e !important;
        margin-top: 15px;
    }
    </style>
@endsection
