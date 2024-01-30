@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row py-4">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row flex-md-row">
                    <div class=""><h5 class="mb-0"><b>ระบบจัดการหมวดหมู่</b></h5></div>
                    <form class="flex-fill d-flex flex-column flex-md-row justify-content-end">
                        <div class="d-flex my-lg-0 my-md-0 my-2">
                            <input type="text" name="search" placeholder="ค้นหา" class="form-control ml-auto" style="max-width: 300px;">
                            <button type="submit" class="btn btn-sm btn-success ml-3">ค้นหา</button>
                        </div>
                        @if (Auth::guard('admin')->user()->type == 'superadmin')
                        <a class="btn btn-success ml-lg-3 ml-md-2 mt-0 mt-lg-0 text-light" href="/dashboard/categories/create">เพิ่มหมวดหมู่</a>
                        @endif
                    </form>
                </div>
                <div class="col-12 p-0">
                    <table class="table table-borderless table-striped table-sm-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th>Action</th>
                                <th>#</th>
                                <th>ชื่อหมวดหมู่</th>
                                <th>อัปเดตเมื่อ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsCategory as $key => $value)
                                <tr>
                                    <td data-label="Action">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item btn btn-sm btn-info" href="/dashboard/categories/edit/{{ $value->id }}">แก้ไข</a>
                                                <a class="dropdown-item btn btn-sm btn-danger" href="#">ลบ</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="#">{{ ($newsCategory->perPage()*($newsCategory->currentPage()-1))+$key+1 }}</td>
                                    <td data-label="ชื่อหมวดหมู่">{{$value->name}}</td>
                                    <td data-label="อัปเดตเมื่อ">{{$value->updated_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $newsCategory->links() }}
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
