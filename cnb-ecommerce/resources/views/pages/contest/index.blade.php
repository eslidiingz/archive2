@extends('layouts.contest')
@section('content')


        




<div class="card">
    <div class="card-head">
        <div class="row">
            <img src="/img/slides3.png" id="bG">
        </div>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                <h2 style="text-align:center; padding-top:15px;padding-bottom:8px; border-bottom:2px solid; margin-bottom:20px; border-radius:8px">สมัครลงแข่งขัน รายการ SHOPTEENII CONTEST 2020</h2>
                <form action="{{ route('contest.edit')}}" method="POST" enctype="multipart/form-data">

            </div>
            <div class="col-md-7 justify-content-center">

                @csrf
                <input type="text" class="university" name="university_name" value="{{isset($university->university_name)? $university->university_name:'UNIVERSITY'}}">

            </div>
        
            <div class="col-md-5 justify-content-start">
                <input type="text" class="university" name="group_name" value="{{isset($university->group_name)? $university->group_name:'GROUP NAME'}}">

            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-7">
                <input type="text" class="nameStudent" name="fullname1" value="{{isset($university->fullname1)? $university->fullname1:'NAME'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="studentID" name="studentid1" value="{{isset($university->studentid1)? $university->studentid1:'STUDENT ID'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="postion" name="position1" value="{{isset($university->position1)? $university->position1:'POSITION'}}">
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-md-7">
                <input type="text" class="nameStudent" name="fullname2" value="{{isset($university->fullname2)? $university->fullname2:'NAME'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="studentID" name="studentid2" value="{{isset($university->studentid2)? $university->studentid2: 'STUDENT ID'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="postion" name="position2" value="{{isset($university->position2)? $university->position2:'POSITION'}}">
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-md-7">
                <input type="text" class="nameStudent" name="fullname3" value="{{isset($university->fullname3)? $university->fullname3:'NAME'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="studentID" name="studentid3" value="{{isset($university->studentid3)? $university->studentid3:'STUDENT'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="postion" name="position3" value="{{isset($university->position3)? $university->position3:'POSITION'}}">
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-md-7">
                <input type="text" class="nameStudent" name="fullname4" value="{{isset($university->fullname4)? $university->fullname4:'NAME'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="studentID" name="studentid4" value="{{isset($university->studentid4)? $university->studentid4:'STUDENT ID'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="postion" name="position4" value="{{isset($university->position4)? $university->position4:'POSITION'}}">
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-md-7">
                <input type="text" class="nameStudent" name="fullname5" value="{{isset($university->fullname5)? $university->fullname5:'NAME'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="studentID" name="studentid5" value="{{isset($university->studentid5)? $university->studentid5:'STUDENT ID'}}">
            </div>
            <div class="col-md-2">
                <input type="text" class="postion" name="position5" value="{{isset($university->position5)? $university->position5:'POSITION'}}">
            </div>
        </div>


        <br><br>

        @if($university != null)
        <div class="row">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-block">
        </div>
        @endif


        <br><br>
        @if($university == null)
        <div class="row">
            <input type="checkbox" name="checkbox" style="margin-top:4px;margin-left:20px;margin-right:10px">I Agree With &nbsp;
            <a href="#" style="text-decoration:underline">Terms & Conditions</a>
        </div>

        <div class="row">
            <p style="margin-left:20px;margin-top:5px">เมื่อสมัครเสร็จแล้ว บัญชีจะถูกจัดอยู่ในประเภทVendor(ผู้ขาย) ซึ่งสามารถเข้าสู่ระบบVendor(ผู้ขาย)ได้ทันที</p>
        </div><br>
        <div class="row">
            <input type="submit" value="Register" name="submit" class="btn btn-primary btn-block">
        </div>
        @endif
        </form>


    </div>
</div>

@stop