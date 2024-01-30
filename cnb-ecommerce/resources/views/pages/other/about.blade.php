@extends('new_ui.layouts.front-end') @section('content')
<div class="container-fluid py-lg-5 py-md-5 py-4 banner_product_n" id="navCategoryTitle">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-dark"><strong>เกี่ยวกับเรา</strong></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row d-lg-block d-md-none d-none">
        <div class="col-12 p-0 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: unset;">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-sky">หน้าแรก</a></li>
                    <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                    <li class="breadcrumb-item active" aria-current="page">เกี่ยวกับเรา</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="form-row mt-4">
        <div class="col-12 mb-3">
            <p style="font-size: 22px !important; text-decoration: underline;">
                <label style="font-size: 18px !important;">
                    ประวัติมหาวิทยาลัย เทคโนโลยีราชมงคลอีสาน เกิดขึ้นตามพระราชบัญญัติมหาวิทยาลัยเทคโนโลยีราชมงคล พ.ศ. 2548 เหตุผล โดยที่มาตรา 36 แห่งพระราชบัญญัติการศึกษาแห่งชาติ พ.ศ. 2542 บัญญัติให้สถานศึกษาของรัฐที่จัดการศึกษา ระดับปริญญาเป็นนิติบุคคล เพื่อให้สถานศึกษาของรัฐดำเนินกิจการได้โดยอิสระสามารถพัฒนาระบบบริหาร และการจัดการที่เป็นของตนเอง มีความคล่องตัวมีเสรีภาพทางวิชาการและอยู่ภายใต้การกำกับดูแลของสภามหาวิทยาลัยฯ ดังนั้นสมควรจัดตั้งมหาวิทยาลัยเทคโนโลยีราชมงคล จำนวน 9 แห่ง ขึ้นแทนสถาบันเทคโนโลยีราชมงคล และมหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน เป็นหนึ่งในจำนวนมหาวิทยาลัยเทคโนโลยีราชมงคลทั้ง 9 แห่ง เป็นสถาบันอุดมศึกษาของรัฐที่เน้นด้านวิชาชีพและเทคโนโลยี ที่มีวัตถุประสงค์ให้การศึกษา ส่งเสริมวิชาการและวิชาชีพชั้นสูงที่มุ่งเน้นการปฏิบัติ ทำการสอน ทำการวิจัย ผลิตครูวิชาชีพ ให้บริการทางวิชาการในด้านวิทยาศาสตร์และเทคโนโลยี และทำนุบำรุงศิลปะและวัฒนธรรม โดยต่อยอดให้ผู้สำเร็จการอาชีวศึกษามีโอกาสในการศึกษาต่อด้านวิชาชีพจนถึงระดับปริญญา
                </label>
            </p>
        </div>
    </div>
</div>
@endsection
