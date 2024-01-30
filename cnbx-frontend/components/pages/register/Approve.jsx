/** @format */

import Link from "next/link";
import Router from "next/router";
import React, { useState } from "react";
import { Form } from "react-bootstrap";
import Swal from "sweetalert2";

const Approve = () => {
  const [approve, setApprove] = useState(null);

  const handleChangeApprove = (selectedApprove) => {
    setApprove(selectedApprove);
  };

  const handleSubmitApprove = async () => {
    try {
      if (sessionStorage.getItem("authentication") === null) {
        return;
      }

      const { access_token } = JSON.parse(
        sessionStorage.getItem("authentication")
      );
      const acceptPolicy = {
        access_token,
        is_policy: true,
        is_approved: approve,
      }
      const response = await fetch(`/api/accept_policy`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({acceptPolicy : acceptPolicy}),
      });
      const res = await response.json();
      if(response.status === 201){
        Router.push("/register/succeed");
      } else {
        // Router.push("/register/succeed");
        Swal.fire("", "ลงทะเบียนไม่สำเร็จ", "error");
        setTimeout(() => {
          Router.push("/register");
        }, 2000)
      }
      // if (response.status) {
      //   Router.push("/register/succeed");
      // } else {
      //   Router.push("/register/succeed");
      // }
    } catch (e) {
      console.log(e);
    }
  };

  return (
    <section className="layout_Approve-components">
      <div className="row">
        <div className="col-lg-12 text-center d-lg-block d-none">
          <img src="../../assets/image/logo.svg" className="iconlogo_reg" />
          <img
            src="../../assets/image/JNFT_LOGO.svg"
            className="iconlogo_JKNFT"
          />
          <h2 className="txt-set-detail-JNFT mt-4">ยินยอมการใช้ข้อมูล</h2>
        </div>
        <div className="col-lg-12 text-center mb-4 d-block d-lg-none">
          <img src="../../assets/image/logo.svg" className="iconlogo_reg" />
        </div>
        <div className="col-lg-12 text-center d-block d-lg-none">
          <img
            src="../../assets/image/JNFT_LOGO.svg"
            className="iconlogo_JKNFT"
          />
        </div>
        <div className="col-12 text-center d-block d-lg-none">
          <h2 className="txt-set-detail-JNFT mt-4">ยินยอมการใช้ข้อมูล</h2>
        </div>
      </div>
      <div className="row d-flex justify-content-center field-group">
        <div className="col-12 col-lg-7 px-lg-0 px-4">
          <div className="box-policy-scroll">
            {/* <div className="txt-detail-gray"> */}
            <p className="text-detail_approve">
              แก่ บริษัท ไปรษณีย์ไทย จำกัด (ปณท) และบริษัท เจ เวนเจอร์ส จำกัด
              ในการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้า
              ในการดำเนินงานเกี่ยวกับบริการลงทะเบียนรับ NFT STAMP
              เพื่อใช้ข้อมูลในการวิเคราะห์ และ/หรือ ประมวลผลข้อมูลส่วนบุคคล
              ในการพัฒนาสินค้าและบริการที่สามารถตอบสนองต่อความต้องการอย่างถูกต้องและเหมาะสม
              การให้บริการหลังการขายรวมถึงติดตาม ประสานงาน แก้ไขปัญหา
              การจัดกิจกรรมส่งเสริมการขาย การมอบของสมนาคุณ
              การแจ้งข่าวสารประชาสัมพันธ์ต่าง ๆ
              รวมทั้งอาจติดต่อเพื่อนำเสนอผลิตภัณฑ์ บริการ
              และสิทธิประโยชน์ที่เหมาะสมแก่ข้าพเจ้าโดยเฉพาะ
            </p>
            <p className="text-detail_approve">
              ทั้งนี้ ก่อนการแสดงเจตนา
              ข้าพเจ้าได้อ่านรายละเอียดและมีความเข้าใจดีแล้ว
              ถึงวัตถุประสงค์ในการเก็บรวบรวม ใช้หรือเปิดเผย (“ประมวลผล”)
              ข้อมูลส่วนบุคคล โดย ปณท และ บริษัท เจ เวนเจอร์ส จำกัด
              จะไม่เก็บข้อมูลส่วนบุคคลของข้าพเจ้าเกินกว่าระยะเวลาที่ ปณท
              และบริษัท เจ เวนเจอร์ส จำกัด จำเป็นต้องใช้ตามวัตถุประสงค์ข้างต้น
            </p>
            <p className="text-detail_approve">
              ข้าพเจ้าให้ความยินยอมหรือปฏิเสธไม่ให้ความยินยอมในเอกสารนี้ด้วยความสมัครใจ
              ปราศจากการบังคับหรือชักจูง
              และข้าพเจ้าทราบว่าข้าพเจ้าสามารถถอนความยินยอมนี้เสียเมื่อใดก็ได้
              เว้นแต่ในกรณีมีข้อจำกัดสิทธิตามกฎหมายหรือยังมีสัญญาระหว่างข้าพเจ้ากับ
              ปณท และบริษัท เจ เวนเจอร์ส จำกัด ที่ให้ประโยชน์แก่ข้าพเจ้าอยู่{" "}
            </p>
            <p className="text-detail_approve">
              กรณีที่ข้าพเจ้าประสงค์จะขอถอนความยินยอม
              ข้าพเจ้าทราบว่าการถอนความยินยอมจะมีผลทำให้ข้าพเจ้าอาจได้รับความสะดวกในการใช้บริการน้อยลง
              หรืออาจไม่ได้รับข่าวสารประชาสัมพันธ์ ของสมนาคุณ
              และสิทธิประโยชน์ที่เหมาะสมบางประการได้
              และข้าพเจ้าทราบว่าการถอนความยินยอมดังกล่าว
              ไม่มีผลกระทบต่อการประมวลผลข้อมูลส่วนบุคคลที่ได้ดำเนินการเสร็จสิ้นไปแล้วก่อนการถอนความยินยอม{" "}
            </p>
            {/* </div> */}
          </div>
        </div>
        <div className="col-12 col-lg-7 my-4 px-lg-0 px-4">
          <Form>
            <div className="mb-3 layout-radio_reg">
              <label className="ci-bg-orange-V1 form-control">
                <input
                  type="radio"
                  name="subject"
                  label="ฉันยอมรับเงื่อนไขข้อตกลง"
                  checked={approve && approve !== null}
                  onChange={() => handleChangeApprove(true)}
                  value="true"
                />{" "}
                <span className="ci-color-black-V1 text-detail_radio">
                  ข้าพเจ้ายินยอมรับเงื่อนไขข้างต้นนี้
                </span>
              </label>
              <label className="ci-bg-orange-V1 form-control me-3">
                <input
                  type="radio"
                  name="subject"
                  label="ไม่ยอมรับ"
                  checked={!approve && approve !== null}
                  onChange={() => handleChangeApprove(false)}
                  value="false"
                />{" "}
                <span className="ci-color-black-V1 text-detail_radio">
                  ข้าพเจ้าไม่ยอมยินยอมรับเงื่อนไขข้างต้นนี้
                </span>
              </label>
            </div>
            <div className="row">
              <div className="col-md-4 col-12 mb-md-0 mb-3">
                <Link href="/">
                  <button className="btn-cancel w-100 btn">ยกเลิก</button>
                </Link>
              </div>
              <div className="col-md-8 col-12">
                {approve ? (
                  <button
                    type="button"
                    className="btn-save w-100 btn"
                    onClick={handleSubmitApprove}
                  >
                    ถัดไป
                  </button>
                ) : (
				          <button
                    type="button"
                    className="btn-save w-100 btn"
                    onClick={handleSubmitApprove}
                  >
                    ถัดไป
                  </button>
                  // <button
                  //   type="button"
                  //   className="btn-save w-100 btn"
                  //   disabled={approve !== null || !approve}
                  // >
                  //   ถัดไป
                  // </button>
                )}
              </div>
            </div>
          </Form>
        </div>
      </div>
    </section>
  );
};

export default Approve;
