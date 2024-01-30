@extends('layouts.default')
@section('style')
<style>
    .o-btn-purple {
        background-color: #c75ba1;
        border-radius: 6px;
        padding: 10px;
        color: #ffffff;
        border: 0px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
    }

    .o-btn-grey {
        background-color: #b1b7bc;
        border-radius: 6px;
        padding: 10px;
        color: #ffffff;
        border: 0px;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
    }

    .o-btn-lpurple {
        background-color: #fff;
        border: 1px solid #c75ba1 ;
        border-radius: 6px;
        padding: 10px;
        color: #c75ba1;
        width: 100px;
        width: 100%;
        height: calc(1.5em + .75rem + 2px);
        padding: .375rem .75rem;
    }

    .cen-div {
        background-color: white;
        border-radius: 8px;
    }

    .cen-button {
        width: 50%;
        margin: 0px auto;
    }

    @media (min-width: 768px) {
        .cen-div {
            width: 60%;
        }

        .cen-button {
            width: 30%;
        }
    }
</style>
@endsection
@section('content')

<body>
    <div class="container">
        <div class="row mx-0">
        <div class='cen-div col-12 my-4 px-3 py-4'>
            <div id='capture'>
                <div class='col-12 pt-4 pb-2 text-center'>
                    <svg width="2em" style='color : #23c197;' height="2em" viewBox="0 0 16 16"
                        class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </svg>
                </div>
                <div>
                    <div class='text-center'>
                        <strong>{{ trans('message.qr_wait_pay') }}</strong>
                    </div>
                    <div class='text-center'>
                        {{ trans('message.qr_wait_pay_desc') }}
                    </div>
                    <div class='text-center py-3'>
                        <div class="row justify-content-center">
                            <div class="col-12 d-flex justify-content-center">
                                <?php // DNS2D::getBarcodeHTML( $mobilebanking->rawQrCode,"QRCODE",5,5) ?>
                                <img width="165" height="165" src="data:image/;base64,{{$mobilebanking->qrImage}}"/>
                            </div>
                        </div>
                    </div>
                    <div class='text-center font-weight-bold'>
                        {{ trans('message.qr_please_pay_before') }} <a style='color:red'>{{ $qrtime[0] }}</a> {{ trans('message.qr_time') }} <a
                            style='color:red'>{{ $qrtime[1] }}</a>
                    </div>
                    <div class='text-center font-weight-bold'>
                        {{ trans('message.amount') }} <a style='color:red'>{{ NUMBER_FORMAT($mobilebanking->amount,2) }} {{ trans('message.baht') }}</a>
                    </div>
                </div>
            </div>
            <div class="row py-3 mx-0" style="background-color: #fff; border-bottom: rgba(0, 0, 0, 0.16) 2px dashed;">
            </div>

            <div class="col-12 px-0 text-center py-4">
                <strong>{{ trans('message.qr_instruction') }}</strong>
            </div>
            <div class='col-lg-4 col-md-6 col-12 mx-auto px-0 mb-4' style='color:#666666;'>
                    <strong><span style="color:#c45e9f;">{{ trans('message.qr_instruction1') }}</span><br>
                    {{ trans('message.qr_instruction2') }}<br>
                    {{ trans('message.qr_instruction3') }}<br>
                    {{ trans('message.qr_instruction4') }}<br>
                    {{ trans('message.qr_instruction5') }}</strong>
            </div>
            <div class='col-lg-4 col-md-6 col-12 mx-auto px-0'>
                <div class='form-row'>
                    <div class='col-lg-12 col-md-12 col-12 order-lg-1 order-1 text-center mb-2'>
                        <a href="/profile_my_sale" class='o-btn-lpurple  form-control'>{{ trans('message.qr_check') }}</a>
                    </div>
                    <div class='col-lg-6 col-md-6 col-12 order-lg-3 order-3 text-center'>
                        <a href="/profile_my_sale" class='o-btn-grey  form-control'>{{ trans('message.qr_close') }}</a>
                    </div>
                    <div class='col-lg-6 col-md-6 col-12 mb-2 order-lg-2 order-2'>
                        <button onclick="savecanvas()" class='o-btn-purple form-control' id='download'
                                    disabled="disabled">{{ trans('message.qr_save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
@endsection

@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>

<script src="/plugins/html2canvas/html2canves.min.js"></script>

<script>
    function savecanvas() {
        document.body.scrollTop = 0;
        $('html, body').animate({scrollTop : 0},800);
        html2canvas(document.querySelector("#capture"), { allowTaint: true , scrollX:0, scrollY: -window.scrollY }).then(canvas => {
            var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
            // colsole.log(image)
            // window.location.href = image;
            saveAs(canvas.toDataURL(), 'QrCode.png');
        });
    } 
    
    function saveAs(uri, filename) {

        var link = document.createElement('a');

        if (typeof link.download === 'string') {

            link.href = uri;
            link.download = filename;

            //Firefox requires the link to be in the body
            document.body.appendChild(link);

            //simulate click
            link.click();

            //remove the link when done
            document.body.removeChild(link);

        } else {

            window.open(uri);

        }
    }

    $(document).ready(function() {
        $('button').removeAttr('disabled');
    });
    
</script>


@endsection