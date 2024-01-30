@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row flex-md-row">
                    <div class=""><h5 class="mb-0"><b>ระบบจัดการข่าวสาร</b></h5></div>
                    <form class="flex-fill d-flex flex-column flex-md-row justify-content-end">
                        <div class="d-flex my-lg-0 my-md-0 my-2">
                            <input type="text" name="search" placeholder="ค้นหา" class="form-control ml-auto" style="max-width: 300px;">
                            <button type="submit" class="btn btn-sm btn-success ml-3">ค้นหา</button>
                        </div>
                        @if (Auth::guard('admin')->user()->type == 'superadmin')
                        <a class="btn btn-success ml-lg-3 ml-md-2 mt-0 mt-lg-0 text-light" href="/dashboard/blogs/create">เพิ่มข่าวสาร</a>
                        @endif
                    </form>
                </div>
                <div class="col-12 p-0">
                    <table class="table table-borderless table-striped table-sm-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th>Action</th>
                                <th>#</th>
                                <th>รูปภาพ</th>
                                <th>ชื่อข่าวสาร</th>
                                <th>รายละเอียด</th>
                                <th>หมวดหมู่</th>
                                <th>โพสต์โดย</th>
                                <th>อัปเดตเมื่อ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $value)
                                <tr>
                                    <td data-label="Action">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item btn btn-sm btn-info" href="/dashboard/blogs/edit/{{ $value->id }}">แก้ไข</a>
                                                <a class="dropdown-item btn btn-sm btn-danger" href="#">ลบ</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="#">{{ ($users->perPage()*($users->currentPage()-1))+$key+1 }}</td>
                                    <td data-label="รูปภาพ">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="embed-responsive embed-responsive-1by1 position-relative"
                                                style="overflow: hidden;width:120px;">
                                                <div class="embed-responsive-item d-flex align-items-center justify-content-center"
                                                    style="overflow: hidden;">
                                                    <img class="img-fluid" src="/img/no_image.png"
                                                        alt="Card image cap">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="ชื่อข่าวสาร">ชื่อข่าวสาร</td>
                                    <td data-label="รายละเอียด">รายละเอียด</td>
                                    <td data-label="หมวดหมู่">หมวดหมู่</td>
                                    <td data-label="โพสต์โดย">admin</td>
                                    <td data-label="อัปเดตเมื่อ">01/12/2021 12:00น.</td>
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
</style>
@endsection
