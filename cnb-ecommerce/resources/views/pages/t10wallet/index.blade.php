@extends('layouts.app')
@section('content')
    <style>
        .container {
            max-width: 1140px;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        body {
            display: none;
        }
    </style>
   <div class="container">
       <div class="row">
           <div class="col-12 mx-auto text-center ">
            <div class="spinner-grow " role="status" style="color:#c75ba1 !important">
                <span class="sr-only">Loading...</span>
              </div>
           </div>
       </div>
        <form  action="https://dev.t10assets.com/ecommerce/pay" method="POST" class="d-none t10wallet">
            <div class="form-group">
                <label for="invoice">invoice</label>
                <input type="text" class="form-control" id="invoice" name="invoice" value={{$t10wallet->invoice}}>
            </div>

            <div class="form-group">
                <label for="token">token</label>
                <input type="text" class="form-control" id="token" name="token" value={{env('T10_APP_TOKEN')}}>
            </div>

            <div class="form-group">
                <label for="price">price</label>
                <input type="text" class="form-control" id="price" name="price" value={{$t10wallet->price}}>
            </div>

            <div class="form-group">
                <label for="urlcallbacksuccess">urlcallbacksuccess</label>
                <input type="text" class="form-control" id="urlcallbacksuccess" name="urlcallbacksuccess" value={{$t10wallet->urlcallbacksuccess}}>
            </div>

            <div class="form-group">
                <label for="urlcallbackfail">urlcallbackfail</label>
                <input type="text" class="form-control" id="urlcallbackfail" name="urlcallbackfail" value={{$t10wallet->urlcallbackfail}}>
            </div>
           
        </form>
   </div>



   <script>
       setTimeout(function(){ document.querySelector("form.t10wallet").submit() },0);
   </script>
@endsection





