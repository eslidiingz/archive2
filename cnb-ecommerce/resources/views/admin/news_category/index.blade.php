@extends('layouts.dashboard')

@section('content')

    <div class="p-0">
        <div class="row py-4">
            <div class="col-12">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row flex-md-row">
                        <div class="">
                            <h5 class="mb-0"><b>ระบบจัดการหมวดหมู่</b></h5>
                        </div>
                        <form class="flex-fill d-flex flex-column flex-md-row justify-content-end">
                            <div class="d-flex my-lg-0 my-md-0 my-2">
                                <input type="text" name="txtSearch" value="{{$request->txtSearch}}" placeholder="ค้นหา" class="form-control ml-auto"
                                    style="max-width: 300px;">
                                <button type="submit" class="form-control btn ml-3 btn-main-set">ค้นหา</button>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <a href="/dashboard/news-categories"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                            </div>
                            @if (Auth::guard('admin')->user()->type == 'superadmin')
                                <a href="{{ url('dashboard/news-categories/create') }}"><input type="button" value="เพิ่มหมวดหมู่" class="form-control btn btn-main-set"></a>
                            @endif
                        </form>
                    </div>
                    <div class="col-12 p-0">
                        <table class="table table-borderless table-striped table-sm-responsive">
                            <thead class="thead-blued">
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
                                                <button class="btn btn-sm btn-outline-pink dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ url('dashboard/news-categories/edit', $value->id) }}"
                                                        class="dropdown-item btn btn-sm btn-outline">แก้ไข</a>

                                                    <a class="dropdown-item btn btn-sm btn-outline"
                                                        data-toggle="modal" data-target="#deleteModal{{ $value->id }}">
                                                        ลบ
                                                    </a>
                                                </div>
                                                <form style="display: inline" role="form"
                                                    action="{{ url('dashboard/news-categories/destroy') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                    <div class="modal fade" id="deleteModal{{ $value->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        ลบหมวดหมู่ #{{ $value->name }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <div class="mb-3">
                                                                        คุณต้องการจะลบหมวดหมู่นี้ใช่หรือไม่?
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
                                            {{ $newsCategory->perPage() * ($newsCategory->currentPage() - 1) + $key + 1 }}
                                        </td>
                                        <td data-label="ชื่อหมวดหมู่">{{ $value->name }}</td>
                                        <td data-label="อัปเดตเมื่อ">{{ $value->updated_at }}</td>
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
