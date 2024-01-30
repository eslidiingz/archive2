@extends('layouts.master')

@section('title') @lang('translation.Photos') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Show Photos @endslot
        @slot('title') Show Photo @endslot
    @endcomponent



@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
