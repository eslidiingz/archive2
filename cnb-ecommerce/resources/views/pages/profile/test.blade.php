@extends('layouts.default')
@section('content')



<div class="container m-5">
    <div class="row">
        <div class="col-xs-6">
            @foreach($user as $item)
            <div class="row">
                <div class="col">
                    <input type="text" value="{{ $item->all()}}">
                </div>
            </div>
            @endforeach </div>
    </div>
</div>


@stop