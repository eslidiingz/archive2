<div class="row">
    <button data-dismiss="drawer" id="dismissDrawer" class="d-none">close</button>
    <div class="col-3">
        <div class="row" style="cursor: pointer;">
            <a href="/profile_my_sale" >
                <div class="col-12 px-2 mb-2 text-center">
                    <img src="/new_ui/img/menu/01.png" class="w-75 position-relative" alt="">
                    @if(@$count1 == 0)
                    @else
                        <!-- <span class="badge badge-danger position-absolute" style="top: 0; right: 8px; font-size: 8px;">{{ @$count1 }}</span> -->
                    @endif
                </div>
                <div class="col-12 px-0 text-center">
                    <h6 style="font-size: 11px;"><strong>Order</strong></h6>
                </div>
            </a>
        </div>
    </div>
    <div class="col-3">
        <div class="row" style="cursor: pointer;">
            <a href="/profile_my_sale#t-3" >
                <div class="col-12 px-2 mb-2 text-center">
                    <img src="/new_ui/img/menu/02.png" class="w-75 position-relative" alt="">
                    @if(@$count2 == 0)
                    @else
                        <span class="badge badge-danger position-absolute" style="top: 0; right: 8px; font-size: 8px;">{{ @$count2 }}</span>
                    @endif
                </div>
                <div class="col-12 px-0 text-center">
                    <h6 style="font-size: 11px;"><strong>{{ trans('message.pf_to_ship') }}</strong></h6>
                </div>
            </a>
        </div>
    </div>
    <div class="col-3">
        <div class="row" style="cursor: pointer;">
            <a href="/profile_my_sale#t-4" >
                <div class="col-12 px-2 mb-2 text-center">
                    <img src="/new_ui/img/menu/03.png" class="w-75 position-relative" alt="">
                    @if(@$count34 == 0)
                    @else
                        <span class="badge badge-danger position-absolute" style="top: 0; right: 8px; font-size: 8px;">{{ @$count34 }}</span>
                    @endif
                </div>
                <div class="col-12 px-0 text-center">
                    <h6 style="font-size: 11px;"><strong>{{ trans('message.pf_to_receive') }}</strong></h6>
                </div>
            </a>
        </div>
    </div>
    <div class="col-3">
        <div class="row" style="cursor: pointer;">
            <a href="/profile_my_sale#t-5" >
                <div class="col-12 px-2 mb-2 text-center">
                    <img src="/new_ui/img/menu/04.png" class="w-75 position-relative" alt="">
                    @if(@$count5 == 0)
                    @else
                        <span class="badge badge-danger position-absolute" style="top: 0; right: 8px; font-size: 8px;">{{ @$count5 }}</span>
                    @endif
                </div>
                <div class="col-12 px-0 text-center">
                    <h6 style="font-size: 11px;"><strong>{{ trans('message.pf_success') }}</strong></h6>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
    .sidenav a{
        font-size: unset;
        padding: 0;
    }
</style>

<script>
    $("#step1").click(function() {
        $('#myTab a[href="#list2"]').tab('show')
    });
</script>
