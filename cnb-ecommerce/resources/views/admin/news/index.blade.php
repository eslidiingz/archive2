@extends('layouts.dashboard')

@section('content')
    <div class="p-0">
        <div class="row py-4">
            <div class="col-12">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-column flex-lg-row flex-md-row">
                        <div class="">
                            <h5 class="mb-0"><b>ระบบจัดการข่าวสาร</b></h5>
                        </div>
                        <form class="flex-fill d-flex flex-column flex-md-row justify-content-end">
                            <div class="d-flex my-lg-0 my-md-0 my-2">
                                <input type="text" name="txtSearch" value="{{$request->txtSearch}}" placeholder="ค้นหา" class="form-control ml-auto"
                                    style="max-width: 480px;">
                                <button type="submit" class="form-control btn ml-3 btn-main-set">ค้นหา</button>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12 mb-2">
                                <a href="/dashboard/news"><input type="button" value="ล้างค่า" class="form-control btn " style="background-color: #ffc107"></a>
                            </div>
                                <a href="{{ url('dashboard/news/create') }}"><input type="button" value="เพิ่มข่าวสาร" class="form-control btn btn-main-set"></a>
                        </form>
                    </div>
                    <div class="col-12 p-0">
                        <table class="table table-borderless table-striped table-sm-responsive">
                            <thead class="thead-blued">
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
                                @foreach ($news as $key => $value)
                                    <tr>
                                        <td data-label="Action">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-pink dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="{{ url('dashboard/news/edit', $value->id) }}"
                                                        class="dropdown-item btn btn-sm btn-info">แก้ไข</a>

                                                    <a class="dropdown-item btn btn-sm btn-danger"
                                                        data-toggle="modal" data-target="#deleteModal{{ $value->id }}">
                                                        ลบ
                                                    </a>
                                                </div>
                                                <form style="display: inline" role="form"
                                                    action="{{ url('dashboard/news/destroy') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                    <div class="modal fade" id="deleteModal{{ $value->id }}"
                                                        tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        ลบข่าวสาร #{{ $value->title }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <div class="mb-3">
                                                                        คุณต้องการจะลบข่าวสารนี้ใช่หรือไม่?
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
                                            {{ $news->perPage() * ($news->currentPage() - 1) + $key + 1 }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($value->img_cover) }}" onerror="this.onerror=null;this.src='/img/no_banner_medix.png'"
                                                alt="" class="rounded avatar-lg" style="max-width: 120px">
                                        </td>
                                        <td data-label="ชื่อข่าว">{{ $value->title }}</td>
                                        <td data-label="ชื่อรายละเอียด">{{ strip_tags( $value->detail ) }}</td>
                                        <td data-label="ชื่อหมวดหมู่">{{ $value->newsCategory->name }}</td>
                                        <td data-label="ชื่อแอดมิน">{{ $value->admin->name }}</td>
                                        <td data-label="อัปเดตเมื่อ">{{ $value->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $news->links() }}
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
    .btn-danger:not(:disabled):not(.disabled).active, .btn-danger:not(:disabled):not(.disabled):active, .show>.btn-danger.dropdown-toggle {
    color: #fff;
    background-color: #346751;
    border-color: #346751;
}
.btn-info:not(:disabled):not(.disabled).active, .btn-info:not(:disabled):not(.disabled):active, .show>.btn-info.dropdown-toggle {
    color: #fff;
    background-color: #346751;
    border-color: #346751;
}
</style>
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
