@extends('layouts.default')

@section('content')
<div class="container" style="height:50vh;">
    <div class="row justify-content-center">
        <div class="col-md-8 my-4">
            <div class="card" style="border : 0px;">
                <div class="card-header" style="border : 0px; background-color: white;">Reset Password</div>

                <div class="card-body">
                    <form method="POST" action="/update-password">
                        @csrf
                        {{-- <input type="hidden" name="_token" value="FrFfv3vbdmjLq6LfsAUyg53HwuPBml37k4Ydh33X">
                        <input type="hidden" name="token" value="4031f8ce692e1dc0b169cec0297feed3148b859192519751e3528dae0ff12b59"> --}}

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">Tel</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control " name="tel" value="{{@$phone}}" required="" autocomplete="tel"  readonly>
                                @error('tel')
                                    <small class="mb-0 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " name="password" required="" autocomplete="new-password" autofocus="">
                                @error('password')
                                    <small class="mb-0 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" autocomplete="new-password">
                                @error('password_confirmation')
                                    <small class="mb-0 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                        </div>
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('style')
<style>
 footer{
     display :none !important;
 }
</style>
@endsection
