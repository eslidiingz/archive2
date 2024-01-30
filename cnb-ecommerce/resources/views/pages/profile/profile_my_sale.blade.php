@extends('layouts.profile')
@section('style')
    <style>
        .nav_custom_cat {
            display: none !important;
        }

        .footer-area {
            display: none;
        }

        @media (min-width: 320px) {
            .pt_80_custom_profile {
                padding-bottom: 80px;
            }
        }

        @media (min-width: 576px) {
            .pt_80_custom_profile {
                padding-bottom: 80px;
            }
        }


        @media (min-width: 768px) {
            .pt_80_custom_profile {
                padding-bottom: 80px;
            }
        }


        @media (min-width: 992px) {
            .pt_80_custom_profile {
                padding-bottom: 0px;
            }
        }


        @media (min-width: 1200px) {
            .pt_80_custom_profile {
                padding-bottom: 0px;
            }
        }

        .cate-all {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="container pt_80_custom_profile">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 mx-auto">
                <div class="row">
                    <div class="col-3 d-xl-block d-lg-block d-md-none d-none px-0 sticky-top mr-0"
                        style="height: calc(100vh - 115px); top: 115px; z-index: 900;">
                        @include('includes._menu_left_user_profile')
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-12 my-lg-4 my-md-2 my-2">
                        <div class="col-12 px-1 pt-3 pb-1" style='border-bottom: 1px solid #d9d9d9;'>
                            <div class='row mx-0'>
                                <div class='col-12 px-lg-0 px-md-3 px-0'>
                                    <h3><strong>{{ trans('message.my_order') }}</strong></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pt-3 px-0">
                            <div class="d-lg-block d-md-block d-none">
                                <ul class="nav nav-tabss" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link nav-links active" id="list-1-tab" data-show="t-1"
                                            data-toggle="tab" href="#list-1" role="tab" aria-controls="list-1"
                                            aria-selected="true">{{ trans('message.all') }}
                                            ({{ count($basket_all->whereIn('status', [1, 12, 13, 21, 2, 3, 4, 43, 5, 52, 53, 54, 7, 6, 99])) }})</a>
                                    </li>
                                    <!-- <li class="nav-item" role="presentation">
                                        <a class="nav-link nav-links" id="list-2-tab" data-show="t-2" data-toggle="tab" href="#list-2"
                                            role="tab" aria-controls="list-2" aria-selected="false">{{ trans('message.pf_to_pay') }}
                                            ({{ count($basket_all->whereIn('status', [1, 12, 13, 21])) }})</a>
                                    </li> -->
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link nav-links" id="list-3-tab" data-show="t-3" data-toggle="tab"
                                            href="#list-3" role="tab" aria-controls="list-3"
                                            aria-selected="false">{{ trans('message.pf_to_ship') }}
                                            ({{ count($basket_all->where('status', 2)) }})</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link nav-links" id="list-4-tab" data-show="t-4" data-toggle="tab"
                                            href="#list-4" role="tab" aria-controls="list-4"
                                            aria-selected="false">{{ trans('message.pf_to_receive') }}
                                            ({{ count($basket_all->whereIn('status', [3, 4, 43])) }})</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link nav-links" id="list-5-tab" data-show="t-5" data-toggle="tab"
                                            href="#list-5" role="tab" aria-controls="list-5"
                                            aria-selected="false">{{ trans('message.pf_success') }}
                                            ({{ count($basket_all->whereIn('status', [5, 52, 53, 54, 7])) }})</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link nav-links" id="list-6-tab" data-show="t-6" data-toggle="tab"
                                            href="#list-6" role="tab" aria-controls="list-6"
                                            aria-selected="false">{{ trans('message.cancel') }}
                                            ({{ count($basket_all->whereIn('status', [6, 99])) }})</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group d-lg-none d-md-none d-block">
                                <select class="form-control" id="select-submenu">
                                    <option value="1">{{ trans('message.all') }}
                                        ({{ count($basket_all->whereIn('status', [1, 12, 13, 2, 3, 4, 43, 5, 52, 53, 54, 7, 6, 99])) }})
                                    </option>
                                    <!-- <option value="2">{{ trans('message.pf_to_pay') }} ({{ count($basket_all->whereIn('status', [1, 12, 13, 21])) }})
                                    </option> -->
                                    <option value="3">{{ trans('message.pf_to_ship') }}
                                        ({{ count($basket_all->where('status', 2)) }})</option>
                                    <option value="4">{{ trans('message.pf_to_receive') }}
                                        ({{ count($basket_all->whereIn('status', [3, 4])) }})
                                    </option>
                                    <option value="5">{{ trans('message.pf_success') }}
                                        ({{ count($basket_all->whereIn('status', [5, 52, 53, 54, 7])) }})
                                    </option>
                                    <option value="6">{{ trans('message.cancel') }}
                                        ({{ count($basket_all->whereIn('status', [6, 99])) }})</option>

                                </select>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="list-1" role="tabpanel">
                                    @if (count($basket_all->whereIn('status', [1, 12, 13, 2, 3, 4, 43, 5, 52, 53, 54, 7, 6, 99])) == 0)
                                        @include('component.no-data')
                                    @else
                                        @foreach ($basket_all->whereIn('status', [1, 12, 13, 2, 3, 4, 43, 5, 52, 53, 54, 7, 6, 99]) as $key => $item)
                                            @include('component.purchase-list-cart')
                                            {{-- @include('component.cancel-modal') --}}
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="list-2" role="tabpanel">
                                    @if (count($basket_all->whereIn('status', [1, 12, 13, 21])) == 0)
                                        @include('component.no-data')
                                    @else
                                        @foreach ($basket_all->whereIn('status', [1, 12, 13, 21]) as $key => $item)
                                            @include('component.purchase-list-cart')
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="list-3" role="tabpanel">
                                    @if (count($basket_all->where('status', 2)) == 0)
                                        @include('component.no-data')
                                    @else
                                        @foreach ($basket_all->where('status', 2) as $key => $item)
                                            @include('component.purchase-list-cart2')
                                            {{-- @include('component.cancel-modal3') --}}
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="list-4" role="tabpanel">
                                    @if (count($basket_all->whereIn('status', [3, 4, 43])) == 0)
                                        @include('component.no-data')
                                    @else
                                        @foreach ($basket_all->whereIn('status', [3, 4, 43]) as $key => $item)
                                            @include('component.purchase-list-cart')
                                            {{-- @include('component.cancel-modal3') --}}
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="list-5" role="tabpanel">
                                    @if (count($basket_all->whereIn('status', [5, 7, 52, 53, 54])) == 0)
                                        @include('component.no-data')
                                    @else
                                        @foreach ($basket_all->whereIn('status', [5, 7, 52, 53, 54]) as $key => $item)
                                            @include('component.purchase-list-cart3')
                                            {{-- @include('component.rating-modal') --}}
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="list-6" role="tabpanel">
                                    @if (count($basket_all->whereIn('status', [6, 99])) == 0)
                                        @include('component.no-data')
                                    @else
                                        @foreach ($basket_all->whereIn('status', [6, 99]) as $key => $item)
                                            @include('component.purchase-list-cart')
                                        @endforeach
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="list-award" role="tabpanel">
                                    {{-- @if (count($basket_all->whereIn('status', [6, 99])) == 0)
                                @include('component.no-data')
                                @else
                                @foreach ($basket_all->whereIn('status', [6, 99]) as $key => $item) --}}
                                    @include('component.purchase-list-cart4')

                                    {{-- @endforeach
                                @endif --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $('#select-submenu').on('change', function() {
            value = $(this).val();
            console.log(value);
            $('a.nav-link[href="#list-' + value + '"]').click();
        });
    </script>

    {{-- <script>
    $(function() {
    $('a[data-toggle="tab"]').on('click', function(e) {
        window.localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = window.localStorage.getItem('activeTab');
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
        window.localStorage.removeItem("activeTab");
    }
});
</script> --}}
    {{-- สคริปปุ่ม ชำระเงิน --}}
    <script>
        // $('.purchase').on('click',function(){
        //     var inv_ref = $(this).parents('.boxInv').find('.inv_ref_show').text();
        //     var shop_id = $(this).parents('.boxInv').find('input[name="shop_id_purchase"]').val();
        //     console.log(inv_ref);
        //     console.log(shop_id);

        //     $.ajax({
        //         url: '/product-payment-repurchase',
        //         type: 'GET',
        //         data : {
        //             inv_ref : inv_ref,
        //             shop_id: shop_id
        //         },
        //         success:function(data){
        //             console.log(data);
        //             window.location.replace('/product-payment-repurchase');
        //         },
        //         error:function(error){
        //             console.log(error);
        //         }

        //     });

        // });
    </script>
    <script>
        $(document).ready(function() {
            var url = window.location.href;
            var res = url.split("#");
            $('[data-show="' + res[1] + '"').tab('show');
            $('#select-submenu').val(res[1].split("t-"));
            // console.log("res", res);

        });
        $('.collapse a').on('click', function() {
            var href = $(this).attr('href');
            var res = href.split("#");
            $('[data-show="' + res[1] + '"').tab('show');
            $('#select-submenu').val(res[1].split("t-"));
            $('#dismissDrawer').click();
            // console.log("href", href);
        });
    </script>

    {{-- script upload img --}}
    <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            var image_html = "<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result +
                                "\" title=\"" +
                                file.name + "\"/>" +
                                "<br/><span class=\"remove\">Remove image</span>" +
                                "</span>";
                            console.log($("input[name]files[]"));
                            $(image_html).insertAfter("#files");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });

                            // Old code here
                            /*$("<img></img>", {
                                class: "imageThumb",
                                src: e.target.result,
                                title: file.name + " | Click to remove"
                            }).insertAfter("#files").click(function(){$(this).remove();});*/

                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/js/fileinput.js" type="text/javascript">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.1.3/themes/fa/theme.js"
        type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        var res_img;
        var res_img_file;
        var four_number = [];
        var count_index = 0;
        var count_array = [];
        $(document).on("click", ".kv-file-remove", function() {
            res_img = count_array[$('.kv-file-remove').index(this) / 2];
            $('[id="' + res_img + '"]').remove();
            count_array.splice($('.kv-file-remove').index(this) / 2, 1);
        })
        $(document).on("click", ".fileinput-remove-button", function() {
            count_array.forEach(res => {
                $('[id="' + res + '"]').remove();
            });
        })

        $("input[type=number]").on("keydown", function(e) {
            var invalidChars = ["-", "+", "e"];
            if (invalidChars.includes(e.key)) {
                e.preventDefault();
            }
        });

        $("#file-1").fileinput({
                theme: 'fa',
                uploadUrl: '{{ route('rating.imgupload') }}',
                uploadAsync: true,
                overwriteInitial: false,
                validateInitialCount: false,
                showUpload: false, // hide upload button
                initialPreviewAsData: true,
                // required: true,


                maxFilesCount: 8,
                uploadExtraData: function() {
                    return {
                        _token: $("input[name='_token']").val(),
                    };
                },
                deleteExtraData: function() {
                    return {
                        _token: $("input[name='_token']").val(),
                    };
                },
                fileActionSettings: {
                    showUpload: false, //This remove the upload button
                    // showRemove: false,
                },
                allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
                browseOnZoneClick: true,
                // initialPreviewAsData: true,
                overwriteInitial: false,
                // maxFileSize: 2000,

                slugCallback: function(filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            })
            .on('fileimageloaded', function(event, previewId) {
                console.log("fileimageloaded");
            })
            .on('filebeforedelete', function() {
                var aborted = !window.confirm('Are you sure you want to delete this file?');
                if (aborted) {
                    window.alert('File deletion was aborted! ');
                };
                return aborted;
            })
            .on('filedeleted', function(event, data, previewId, index) {
                // console.log(`input[name="img_upload[]"][val="${data}"]`);
                console.log("TRTRTRTRTR");

                // $("#file-1").fileinput('clear');
                $("#file-1").text("");
                console.log($("#file-1").val());
                // $(`input[name="img_upload[]"][value="${data}"]`).remove();

            })
            .on('fileuploaded', function(event, data, previewId, index, id) {
                console.log(this)
                var form = data.form,
                    files = data.files,
                    extra = data.extra,
                    response = data.response,
                    reader = data.reader;
                res_img = response.uploaded;
                index++;
                res_img_file = res_img.substring(0, res_img.lastIndexOf("."));
                $("body").find("form").append(
                    `<input type="hidden" id="${res_img}" name="img_upload[]" value="${res_img}">`);
                $("#file-1").text(res_img);
                $("#file-1").prop('required', false);
                // console.log(event, data, previewId, index,id)

                four_number[index] = res_img;

                count_array.push(four_number[index]);
                console.log("index ::", index, "new index ::", count_array, "arrayLenght ::", count_array.length)
                // console.log("count_index ::",count_index = count_index + index)
                // four_number[index] = res_img
            })
            .on("filebatchselected", function(event, data, previewId, index) {
                var form = data.form,
                    files = data.files,
                    extra = data.extra,
                    response = data.response,
                    reader = data.reader;
                $("#file-1").fileinput("upload");
                // console.log("filebatchselected", data);
            })
            .on('filesuccessremove', function(event, id, data, a, b) {
                // var res_img = $(event.target).text()
                // console.log(event,id,data,a,b)
                // console.log(event,id,data,a,b)
                // var form = data.form,
                //     files = data.files,
                //     extra = data.extra,
                //     response = data.response,
                //     reader = data.reader;
                //     res_img = response.uploaded;
                // console.log('id = ' + id + ', index = ' + index);
                // console.log('id = ' + id + ', event = ' + event);

                // document.getElementById(res_img).remove()
                // $(window).on("load", function(){
                // var el = document.getElementById(res_img);
                // $('[id="'+res_img+'"]').remove();
                // console.log('[id="'+res_img+'"]');
                // console.log(data,"res_img",el)
                // });
            })
        $("#send-data").on("click", function(e) {
            if (count_array.length == 0) {
                // $("body").find("form").append(`<input type="hidden" name="img_upload[]" value="{{ asset('img/no_image.png') }}" required>`);
                $("#file-1").prop('required', true);
                $("#file-1").fileinput("upload");
                e.preventDefault()
                console.log("iff");
            }

            // $("#file-1").fileinput("upload");
            // else{
            //     $("#file-1").fileinput("upload");
            //     console.log("elseee");
            // }

        });


        $(".test_res").click(function() {

            console.log(res_img);
        });
    </script>
@endsection
