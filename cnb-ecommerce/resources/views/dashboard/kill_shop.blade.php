@extends('layouts.dashboard')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<style>
    .box {
        height: calc(100vh - 200px);
        ;
    }

    .top {
        margin-top: 100px;
    }

    .nav-link.active {
        color: white !important;
        background-color: #c75ba1 !important;
    }

    .nav-tabs {
        border-bottom: 5px solid #c75ba1 !important;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .nav-tabs .nav-link {
        border-bottom: 1px solid #c75ba1 !important;
        border-top-left-radius: 8px !important;
        border-top-right-radius: 8px !important;
        padding-bottom: 10px !important;
    }

    .nav-item {
        font-size: 16px !important;
        padding-right: 5px !important;
    }

    .nav-link {
        color: black !important;
        background: #efefef;
    }

    .table.dataTable.no-footer {
        border: unset;
    }

    .table.dataTable tbody tr {
        background-color: #ffffff;
    }

    textarea {
        resize: none;
        white-space: nowrap;
        overflow-x: scroll;
        /* or hidden */
    }
</style>
@php
// dd($invs);
@endphp

<div class="container-fluid px-0" style='background:#fdf7fb'>
    <div class="row">
        <div class="col-xl-12 col-12 ml-xl-auto">
            <h5 class="mt-4"><b>ลบร้านค้า (╯°□°）╯︵ ┻━┻)</b>
            </h5>
            <div class=" text-center">
                <div class="d-lg-block d-md-block d-none" style='font-size:unset'>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="list-1-tab" data-toggle="tab" href="#list-1" role="tab"
                                aria-controls="list-1" aria-selected="true">ทั้งหมด
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- SEARCH --}}
                <div class="col-lg-12 col-md-12 col-12 pt-4">
                    <form role="search" action="/dashboard/del_all_phone" method="POST">
                        @csrf
                        <textarea id="phone" name="phone" class='form-control'>

                            </textarea>
                        <div class="col-lg-2 col-md-2 col-12 mb-2">
                            <input type="submit" value="Drop It" name="filter" id="filter"
                                class="form-control btn btn-primary">
                        </div>
                    </form>
                </div>
                {{-- SEARCH --}}

                <div class="w-100">
                    <div class="tab-content">
                        {{-- 1taphome --}}
                        lnwza
                    </div>
                </div>
                @endsection


                @section('script')

                <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
                {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

                <script>
                    $('#select-submenu').on('change', function () {
                        value = $(this).val();
                        $('a.nav-link[href="#list-' + value + '"]').click();
                    });

                </script>

                <script>
                    $(document).ready(function () {


                        $("#status option").each(function (index) {
                            location.getParams = getParams;
                            // console.log (location.getParams()["status"]);
                            if($(this).val() == location.getParams()["status"]){
                                $(this).attr('selected','true');
                                console.log($(this).val());
                            }
                        });

                        $('#add-note').click(function () {
                            var note = $('#note_note').val();
                            console.log(note);
                        });


                    });

                    $(':checkbox').on('click', function () {
                        $('tr').find("th.no-sort").removeClass("sorting_asc");
                        var get_chkbox = $(this).attr('status');
                        if (get_chkbox != null) {
                            if (this.checked) {
                                $('.checkbox' + get_chkbox).each(function () {
                                    this.checked = true;
                                });
                            } else {
                                $('.checkbox' + get_chkbox).each(function () {
                                    this.checked = false;
                                });
                            }
                        }
                    });

                    $('.login_submit').on('click', function () {
                        console.log('a');
                        $(this).prop('disabled', true);
                        var confirm = $('input[name="chk_method"]:checked').val();
                        if (confirm) {
                            $(this).parents('.modal').find('form.btnapprovewithdrows').submit();
                            console.log('b');
                        } else {
                            alert('โปรดยืนยัน');
                        }
                    });
                    $('input:radio').change(function () {
                        var status = $(this).val();
                        var textarea = $(this).parents('.modal').find('div.remark-chk');
                        var textarea2 = $(this).parents('.modal').find('textarea.remark-text');

                        if (status == 'confirm') {
                            textarea.css('display', 'none');
                            textarea2.removeAttr('required');
                        } else {
                            textarea.css('display', 'block');
                            textarea2.attr("required", "true");
                        }
                    });

                    function getParams() {
                            var result = {};
                            var tmp = [];

                            location.search
                                .substr(1)
                                .split("&")
                                .forEach(function (item) {
                                    tmp = item.split("=");
                                    result[tmp[0]] = decodeURIComponent(tmp[1]);
                                });

                            return result;
                        }

                    // 	// document.getElementById("#success-modal").showModal();
                    // 	// $('#add-modal').modal('hide')
                    // 	// $('#success-modal').modal('show')
                    // 	// $(document).click(function(){
                    // 	// 	window.location.reload(true);
                    // });
                    // 	// window.location.reload(true);
                    // 	// document.getElementById("#divv").disabled = true;
                    // 	// document.getElementById("#addbankbutton").disabled = true;
                    // 	}
                    // });

                    // });
                    // function myFunction() {
                    // document.getElementById("demo").innerHTML = "<input>";
                    // }
                    // $("#hide").click(function(){
                    // $("#demo").hide();
                    // });
                    // $("#show").click(function(){
                    //     $("#demo").show();
                    //     console.log("5555")
                    // });

                    // $(document).on("click",".showinput",function(){

                    //     $(".inputshow").show("sds");
                    //     console.log("3333")
                    // });
                    // $(document).on("click",".showdd",function(){
                    //     var x = document.getElementById("myDIV");
                    //         if (x.style.display === "none") {
                    //             x.style.display = "block";
                    //         } else {
                    //             x.style.display = "none";
                    //         }
                    // });

                </script>

                @endsection