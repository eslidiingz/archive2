@extends('layouts.dashboard')
@section('content')

<div class="row justify-content-center top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-12 ml-xl-auto">
                <div class="card">
                    <div class="card-body m-2 p-0"><br><br><br><br><br>
                        <div class="row">
                            <div class="col-6">

                            </div>
                            <div class="col-6 p-0 ml-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tap">
                                    Launch demo modal
                                  </button>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="tap" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="tapLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="tapLabel"><b>CASE</b>....</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            {{-- <div class="modal-dialog modal-dialog-scrollable"> --}}
                <div class="modal-body">
                    <div class="container-fulid">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-md-6">
                                <h5><b>INV</b>......................</h5>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b class="pr-3">ชื่อ</b> เทสเทส เทสเทสเทส</h5> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h5> <b class="pr-3">เบอร์ติดต่อ</b>0899999999</h5>
                                    </div>
                                </div> 
                            </div>    
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b>รายละเอียดสินค้า</b></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b>รายละเอียดเคส</b></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b>รูป</b></h5>
                                    </div>
                                </div>
                                <div class="row mt-2 text-center">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                        <img src="new_ui/img/user_icon_menu/user-seller.png"style="width:200px"class="img-thumbnail">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                        <img src="new_ui/img/user_icon_menu/user-seller.png"style="width:200px"class="img-thumbnail">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                        <img src="new_ui/img/user_icon_menu/user-seller.png"style="width:200px"class="img-thumbnail">
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                        <img src="new_ui/img/user_icon_menu/user-seller.png"style="width:200px"class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b>รายละเอียดร้าน</b></h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Basics by sita | A224 - One Button Box by sita Button....Basics by sita | A224 - One Button Box by sita Button....Basics by sita </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 border-left">
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b>Note Admin</b></h5>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-12">
                                        <p>Basics by sita | A224 - One Button Box by sita Button....Basics by sita |</p>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

            {{-- </div> --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-link"style="background-color:#c75ba1;color:#fff">ตกลง</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal-dialog modal-dialog-scrollable">

</div> --}}
@endsection

@section('script')
  <script>
        // $('.myModal').on('shown.bs.modal', function () {
        // $('.myInput').trigger('focus')
        // })
  </script>

@endsection