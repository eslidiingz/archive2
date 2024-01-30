@extends('new_ui.layouts.front-end')
@section('content')
    <div class="container-fluid py-lg-5 py-md-5 py-4 banner_product_n" id="navCategoryTitle">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-dark"><strong>ข้อตกลงและเงื่อนไข</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-lg-block d-md-none d-none">
            <div class="col-12 p-0 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: unset;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="color-sky" >หน้าแรก</a></li>
                        <i class="fa fa-angle-right px-2 d-flex align-items-center" aria-hidden="true"></i>
                        <li class="breadcrumb-item active" aria-current="page">ข้อตกลงและเงื่อนไข</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- <div class="form-row mt-4">
            <div class="col-12 mb-3">
                <p style="font-size: 22px !important;">
                    ข้อตกลงและเงื่อนไขในการตีความ
                    <br>
                <label style="font-size: 18px !important;">
                    ยกเว้นแต่หัวเรื่องหรือบริบทจะกำหนดเป็นอย่างอื่นคำศัพท์และข้อความภายใต้สัญญาฉบับนี้จะมีความหมายดังต่อไปนี้
                </label>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">ความหมาย</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Agreement <br><br>
                                    สัญญา
                                </th>
                                <td colspan="3" style="text-align: justify;">means this agreement entered into by and between MEDIXMARKET and the Seller
                                    to use MEDIXMARKET Platform for sale of the Seller’s Goods to Customers, howsoever
                                    formed or concluded. This Agreement shall include any appendices and documentation
                                    expressly referenced therein. <br><br>
                                    หมายถึง สัญญาฉบับนี้ซึ่งทำขึ้นโดยและระหว่าง MEDIXMARKET และผู้ขายเพื่อใช้ MEDIXMARKET
                                    Platform สำหรับการขายสินค้าของผู้ขายให้แก่ลูกค้า ไม่ว่าจะอยู่ในรูปแบบใดก็ตาม อนึ่ง
                                    สัญญาฉบับนี้รวมถึงภาคผนวกและเอกสารอื่นใดที่อ้างถึงด้วย
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Business Day <br><br>
                                    วันทำการ
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means a day which is neither (i) a Saturday or Sunday, nor (ii) a public holiday on
                                    which banks in Thailand are closed in accordance with the announcement of the Bank of
                                    Thailand. <br><br>
                                    หมายถึง วันซึ่งไม่ใช่ (ก) วันเสาร์หรือวันอาทิตย์ และ (ข)
                                    วันหยุดนักขัตฤกษ์ซึ่งธนาคารในประเทศไทยหยุดทำการอันเป็นไปตามประกาศของธนาคารแห่งประเทศไทย
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Conditions <br><br>
                                    เงื่อนไข
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means the terms and conditions set out in this Agreement, unless the context requires
                                    otherwise, and including any special terms and conditions agreed in writing between the
                                    Seller and MEDIXMARKET at a later date. <br><br>
                                    หมายถึง เงื่อนไขและข้อกำหนดซึ่งกำหนดไว้ภายใต้สัญญาฉบับนี้ยกเว้นแต่บริบทจะกำหนดไว้เป็นอย่างอื่นโดยรวมถึงเงื่อนไขและข้อกำหนดพิเศษซึ่งได้ตกลงกันเป็นลายลักษณ์อักษรระหว่างผู้ขาย
                                    และ MEDIXMARKET ในภายหลัง
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Commission Fee <br><br>
                                    ค่าคอมมิชชั่น
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means the amount of sales generated by the Seller after the deduction of returns,
                                    allowances for damaged or missing goods and any discounts allowed multiply by the
                                    Commission Rate as specified in the appendices of this Agreement for using the
                                    marketplace services of MEDIXMARKET Platform. <br><br>
                                    หมายถึง ปริมาณการขายของผู้ขายภายหลังจากการหักลดการคืนสินค้าค่าใช้จ่ายอันเกิดจากสินค้าเสียหายหรือหาย
                                    และส่วนลดใด
                                    คูณด้วยอัตราค่าธรรมเนียมตามที่ระบุไว้ในภาคผนวกของสัญญาฉบับนี้สำหรับการใช้บริการตลาดกลางเพื่อการซื้อขายผ่าน
                                    MEDIXMARKET Platform
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Customer(s) <br><br>
                                    ลูกค้า
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means customer(s) who purchases Goods on MEDIXMARKET Platform. <br><br>
                                    หมายถึง ลูกค้าผู้ซึ่งซื้อสินค้าบน MEDIXMARKET Platform
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Goods <br><br>
                                    สินค้า
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means the goods, including any installment of the goods or any parts of them, which the
                                    Seller intends to provide or sell to Customers over MEDIXMARKET Platform. <br><br>
                                    หมายถึง สินค้า รวมถึงส่วนของสินค้าใด ๆ
                                    ซึ่งผู้ขายมีเจตนาที่จะขายให้แก่ลูกค้าผ่านMEDIXMARKET Platform
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Handling Time <br><br>
                                    เวลาส่งมอบ

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means a period of 48 hours after the Goods are ordered by Customers. <br><br>
                                    หมายถึง ระยะเวลา 48 ชั่วโมง ภายหลังจากที่สินค้าถูกสั่งซื้อโดยลูกค้า

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    In writing/ written <br><br>
                                    ลายลักษณ์อักษร

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    includes mails or electronic mails send to MEDIXMARKET’s address and the contact person
                                    as described in Clause 23.7, any comparable means of communication, so long as such form
                                    results in a permanent record being made. <br><br>
                                    รวมถึงจดหมาย หรือจดหมายอิเล็กทรอนิกส์ซึ่งส่งมายังที่อยู่ของ MEDIXMARKET
                                    และผู้ติดต่อที่ระบุไว้ตามข้อ 23.7
                                    และวิธีการติดต่อสื่อสารอื่นใดตราบเท่าที่ส่งผลก่อให้เกิดสิ่งบันทึกถาวร

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Intellectual Property <br><br>
                                    ทรัพย์สินทางปัญญา

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means any patent, copyright, registered or unregistered design, design right, registered
                                    or unregistered trademark, service mark or other industrial or intellectual property
                                    right and includes applications for any of the same. <br><br>
                                    หมายถึง ลิขสิทธิ์ เครื่องหมายการค้า งานออกแบบที่จดทะเบียนหรือไม่ได้จดทะเบียน
                                    สิทธิในงานออกแบบ เครื่องหมายการค้าที่ได้รับการจดทะเบียนหรือไม่ได้รับการจดทะเบียน
                                    เครื่องหมายบริการหรือทรัพย์สินทางปัญญาในเชิงอุตสาหกรรมอื่นใด รวมถึงสิ่งมีลักษณะคล้ายกัน

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Listing Price <br><br>
                                    รายการราคาสินค้า

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means listing price of any respective Goods shown on MEDIXMARKET Platform. It shall
                                    always include Value Added Tax (“VAT”) (if applicable) and any taxes related hereto.
                                    <br><br>
                                    หมายถึง รายการราคาสินค้าซึ่งแสดงอยู่บน MEDIXMARKET Platform ซึ่งรวมถึงภาษีมูลค่าเพิ่ม
                                    (หากมี) และภาษีอื่นๆ ที่เกี่ยวข้อง

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Logistics Provider <br><br>
                                    ผู้ให้บริการขนส่ง

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means the third party logistics provider designated or appointed by MEDIXMARKET to
                                    deliver Goods from the Seller to Customers. <br><br>
                                    หมายถึง ผู้ให้บริการขนส่งภายนอกซึ่งได้รับมอบหมายหรือแต่งตั้งโดย MEDIXMARKET
                                    ให้ดำเนินการขนส่งสินค้าจากผู้ขายไปยังลูกค้า

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Net Sales <br><br>
                                    ยอดรวมการขาย

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means the aggregate amounts, inclusive of value-added taxes (VAT) and other local taxes
                                    as and if appropriate, and exclusive of any discounts, of money or order value or
                                    amounts for all goods, both physical and virtual and services transacted using
                                    MEDIXMARKET Platform, including but not limited to the form of cash, debit or credit
                                    card, credit note, bank transfer, installments mobile payment or any other forms of
                                    legal payment method under Thailand’s laws, less any and all returns, cancellations and
                                    invalidations of orders that occurred and completed during a specific settlement period
                                    designated by MEDIXMARKET. <br><br>
                                    หมายถึง ยอดรวมทั้งหมด ซึ่งรวมภาษีมูลค่าเพิ่มและภาษีอื่น ๆ แต่ไม่รวมส่วนลด
                                    ของจำนวนเงินหรือมูลค่าการสั่งซื้อ หรือมูลค่าของสินค้าทั้งหมด
                                    ไม่ว่าจะอยู่ในรูปแบบกายภาพหรือเสมือนจริง รวมทั้งการบริการซึ่งมีการดำเนินธุรกรรมผ่าน
                                    MEDIXMARKET Platform ซึ่งรวมถึงแต่ไม่จำกัดอยู่ในรูปแบบของเงินสด บัตรเดบิตหรือบัตรเครดิต
                                    ใบลดหนี้ รายการโอน การจ่ายเงินผ่านโทรศัพท์มือถือเป็นงวด ๆ
                                    หรือกระบวนการชำระหนี้อื่นใดที่มีผลภายใต้กฎหมายไทย หักลบกับการคืนสินค้า การยกเลิก
                                    และรายการสั่งซื้อที่ไม่เป็นผลซึ่งเกิดขึ้นระหว่างช่วงระยะเวลาการชำระหนี้ (settlement
                                    period) ที่กำหนดโดย MEDIXMARKET means the website “www.medixmarket.com\” or any other
                                    website as designated by MEDIXMARKET. หมายถึง เว็บไซต์ “www.medixmarket.com”
                                    หรือเว็บไซต์อื่นใดที่กำหนดโดย MEDIXMARKET

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Platform <br><br>
                                    แพลตฟอร์ม
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    -
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Seller <br><br>
                                    ผู้ขาย

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means a company or other legal entity using the Platform for the sale of its respective
                                    Goods. <br><br>
                                    หมายถึง บริษัทหรือนิติบุคคลใดที่ใช้แพลตฟอร์มสำหรับการขายสินค้า

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Seller Centre
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means the platform provided to Seller to run and manage their marketplace account. <br><br>
                                    หมายถึง ระบบที่จัดไว้ให้แก่ผู้ขายเพื่อที่ทำดำเนินการและบริหารจัดการบัญชีตลาดกลางการติดต่อซื้อขาย

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    SKU
                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means stock keeping unit. It is the unit allocated to each Goods sold by the Seller on
                                    the Platform which is unique and allows one product to be distinguished from any other
                                    product. <br><br>
                                    หมายถึง หน่วยสินค้าในสต๊อกซึ่งกำหนดเป็นหน่วยของสินค้าแต่ละชนิดที่ขาย
                                    โดยผู้ขายบนแพลตฟอร์มซึ่งก่อให้เกิดความแตกต่างอันจะทำให้สามารถระบุความแตกต่างของสินค้าชนิดหนึ่ง
                                    ๆ ได้

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    THB <br><br>
                                    บาท

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    means Thai Baht which is the lawful currency of Thailand. <br><br>
                                    หมายถึง สกุลเงินบาท ซึ่งเป็นสกุลเงินที่ใช้ชำระหนี้ได้ตามกฎหมายไทย

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Platform Rules <br><br>
                                    ระเบียบของแพลต
                                    ฟอร์ม

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    refers to any regulatory documents related to merchant operations that are posted on the
                                    MEDIXMARKET Platform, including but not limited to the Merchant’s Manual, the Backstage
                                    Bulletin for Merchants, the Backstage Help Centre for Merchants, etc. <br><br>
                                    หมายถึง เอกสารว่าด้วยกฎระเบียบอันเกี่ยวข้องกับการดำเนินการซื้อขายซึ่งได้แสดงอยู่ บน
                                    MEDIXMARKET Platform รวมถึงแต่ไม่จำกันเพียงแต่คู่มือการซื้อขาย Backstage Bulletin for
                                    Merchants, Backstage Help Centre for Merchants ฯลฯ

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Platform Use Fee <br><br>
                                    ค่าธรรมเนียมการใช้แพลตฟอร์ม

                                </th>
                                <td colspan="3" style="text-align: justify;">
                                    a fixed technical service fee paid by the Seller in accordance with this Agreement for
                                    using various services of the MEDIXMARKET Platform. <br><br>
                                    หมายถึง ค่าธรรมเนียมอันเกี่ยวกับการให้บริการทางเทคโนโลยีซึ่งชำระโดยผู้ขาย
                                    โดยเป็นไปตามสัญญาฉบับนี้อันเนื่องมาจากการใช้การบริการผ่าน MEDIXMARKET Platform

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->
        <!-- <label style="font-size: 18px !important;">
            <span style="text-decoration: underline;">หมายเหตุ</span> รายละเอียดสัญญาฉบับสมบูรณ์สามารถสอบถามเพิ่มเติมได้ที่
            <a href="mailto: support@Medixmarket.com"
            class="color-sky">support@Medixmarket.com</a>
        </label> -->
    </div>
    <br><br>
@endsection
