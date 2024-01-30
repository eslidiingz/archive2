@extends('new_ui.layouts.front-end-seller')
@section('content')
                <div class="row">
                    <div class="col-12 px-1 pt-4 d-flex flex-row">
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-5">
                            <h3><strong>ที่อยู่ของฉัน</strong></h3>
                            <p>ตั้งค่าที่อยู่สำหรับการจัดส่งและนัดรับสินค้า</p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-2" style='text-align : right;'>
                            <button class="o-btn" data-toggle="modal" data-target="#add_address">+ เพิ่มที่อยู่ใหม่</button>
                        </div>
                    </div>

                    <div class='col-12 p4'>
                        <div class='row mx-0' style='background-color: white; padding-top : 20px; padding-bottom : 20px;'>
                            <div class='col-lg-10 col-md-10 col-sm-12 d-flex flex-row'>
                                <div><img src="new_ui/img/bank/placeholder.png" style="width: 20px;" class="mr-3 rounded8px" alt="..."></div>
                                <div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                ชื่อนามสกุล
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-12 strong-text">
                                                <strong>Bigcharee Shop</strong>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                หมายเลขโทรศัพท์
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-12 strong-text">
                                                <strong>080 081 8292</strong>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                ที่อยู่
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-12 strong-text">
                                                <strong>ซอยลาดปลาเค้า 36 แขวางลาดพร้าว เขตลาดพร้าว กรุงเทพมหานคร 10230</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-2 col-md-2 col-sm-12' style='text-align : right'>
                                <button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item" type="button">แก้ไข</a>
                                    <a href="#" class="dropdown-item" type="button">ลบ</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-12 p4 '>
                        <div class='row mx-0' style='background-color: white; padding-top : 20px; padding-bottom : 20px;'>
                            <div class='col-lg-10 col-md-10 col-sm-12 d-flex flex-row'>
                                <div><img src="new_ui/img/bank/placeholder.png" style="width: 20px;" class="mr-3 rounded8px" alt="..."></div>
                                <div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                ชื่อนามสกุล
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-12 strong-text">
                                                <strong>Bigcharee Shop</strong>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                หมายเลขโทรศัพท์
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-12 strong-text">
                                                <strong>097 201 9120</strong>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                ที่อยู่
                                            </div>
                                            <div class="col-lg-9 col-md-8 col-sm-12 strong-text">
                                                <strong>ซอยลาดปลาเค้า 74 แขวางลาดพร้าว เขตลาดพร้าว กรุงเทพมหานคร 10230</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-lg-2 col-md-2 col-sm-12' style='text-align : right'>
                                <button type="button" class="btn btn-outline-dark dropdown-toggle px-1 py-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item" type="button">แก้ไข</a>
                                    <a href="#" class="dropdown-item" type="button">ลบ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection


 <!-- Modal -->
    <div class="modal fade" id="add_address" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header" style='text-align : center'>

                    <h4>เพิ่มที่อยู่ใหม่</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ชื่อผู้ส่ง" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style='background-color: #ededed;'>
                                <button style='color: black;' class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>+66</strong></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">+67</a>
                                    <a class="dropdown-item" href="#">+68</a>
                                    <a class="dropdown-item" href="#">+69</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">+70</a>
                                </div>
                            </div>
                            <input type="text" class="form-control" style='background-color: #ededed;' aria-label="Text input with dropdown button">
                        </div>
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="บ้านเลขที่" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ซอย" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ถนน" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="exampleFormControlSelect1">
                                <option>จังหวัด</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="exampleFormControlSelect1">
                                <option>เขต</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <select class="form-control rounded8px" style="background-color: #ededed; border: none;" id="exampleFormControlSelect1">
                                <option>แขวง</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <input type="text" class="form-control rounded8px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="รหัสไปรษณีย์" style="background-color: #ededed; border: none;">
                    </div>
                    <div class="col-12 mb-3 mt-4 ">
                        <div class='row'>
                            <div class="col-6 mb-3 text-center">
                                <button class="btn form-control text-white rounded8px" data-dismiss="modal" style="background-color: #b2b2b2;">ยกเลิก</button>
                            </div>
                            <div class="col-6 mb-3 text-center">
                                <button class="btn form-control text-white rounded8px" onclick="myFunction()" style="background-color: #c75ba1;">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->

@section('style')
<style>
    .p4 {
        padding: 10px 25px 10px 25px;
    }

    .strong-text {
        margin-bottom: 10px;
    }

    .o-btn {
        border-radius: 8px;
        background-color: #226fff;
        padding: 10px;
        color: white;
        border: 0px;
    }
</style>
@endsection