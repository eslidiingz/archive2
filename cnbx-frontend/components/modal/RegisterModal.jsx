import React, { useState } from "react";

import { useRouter } from "next/router";

import Swal from "sweetalert2";

import Modal from "react-bootstrap/Modal";

import { Form, Button, InputGroup } from "react-bootstrap";

import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

function RegisterModal(props) {
  const router = useRouter();

  const [requestOTP, setRequestOTP] = useState(false);
  const [verifyOTP, setVerifyOTP] = useState({});
  const [OTPNumber, setOTPNumber] = useState("");
  const [isMember, setIsMember] = useState(false);

  const [dateOfBirth, setDateOfBirth] = useState(new Date());

  const dateFormat = (date) => {
    try {
      let a = date.split("/");
      let dateString = a[2] + "-" + a[1] + "-" + a[0];
      return dateString;
    } catch (error) {
      console.log(error);
      return "";
    }
  };

  const handleSubmitRegister = async (event) => {
    try {
      event.preventDefault();

      if (sessionStorage.getItem("authentication") === null) {
        return;
      }

      const { access_token } = JSON.parse(
        sessionStorage.getItem("authentication")
      );
      // console.log(" === event.target.date_of_birth.value ", event.target.date_of_birth.value)
      // console.log(" === dateToString ", dateFormat(event.target.date_of_birth.value))
      const data = {
        name: event.target.name.value,
        lastname: event.target.lastname.value,
        citizen_number: event.target.citizen_number.value,
        date_of_birth: dateFormat(event.target.date_of_birth.value),
        email: event.target.email.value,
        phone_number: event.target.phone_number.value,
        access_token,
        is_member: isMember,
      };

      const verifyUser = await fetch("/api/verify_user", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
      });

      const _verifyUser = await verifyUser.json();

      if (_verifyUser.status === false) {
        Swal.fire(
          "",
          `หมายเลขโทรศัพท์ หรือหมายเลขบัตรประชาชนนี้ได้ใช้ลงทะเบียนไปแล้ว`,
          "warning"
        );
        return;
      }

      const response = await fetch("/api/update_profile_metamask", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });

      const res = await response.json();

      if (response.status !== 201) {
        if (res.data?.includes("phone_number")) {
          await Swal.fire(
            "",
            `หมายเลขโทรศัพท์นี้ได้ใช้ลงทะเบียนไปแล้ว`,
            "warning"
          );
        } else if (res.data?.includes("citizen_number")) {
          await Swal.fire(
            "",
            `หมายเลขบัตรประชาชนนี้ได้ใช้ลงทะเบียนไปแล้ว`,
            "warning"
          );
        }
        return;
      }

      setVerifyOTP({
        phone_number: res?.data?.phone_number,
        otp_ref: res?.data?.otp_ref,
      });

      setRequestOTP(true);
    } catch (error) {
      console.log(error);
      setRequestOTP(false);
    }
  };

  const handleVerifySign = async () => {
    try {
      if (sessionStorage.getItem("authentication") === null) {
        return;
      }

      const { phone_number, otp_ref } = verifyOTP;

      const { access_token } = JSON.parse(
        sessionStorage.getItem("authentication")
      );
      const body = {
        phone_number,
        otp_ref,
        otp_number: OTPNumber,
        access_token,
      };
      const response = await fetch("/api/verify_profile_metamask", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(body),
      });

      const res = await response.json();

      if (response.status === 201) {
        router.push("/register/policy");
      }
    } catch (error) {
      console.log(error);
    }
  };

  return (
    <>
      {/* <div className=""> */}
      <Modal
        show={props.show}
        onHide={props.onHide}
        size="md"
        className="layout_RegisterModal"
      >
        <Modal.Header closeButton>
          <Modal.Title>
            <div className="d-block">
              <p className="tittle_layoutRegisterModal">
                กรุณากรอกข้อมูลเพิ่มเติม
              </p>
              <p className="detail_layoutRegisterModal">
                ข้อมูลนี้จะใช้ในการระบุการเป็นเจ้าของคริปโทแสตมป์ที่คุณจะได้รับ
              </p>
            </div>
          </Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <div className="row">
            <div className="col-12 mb-3 d-flex justify-content-center">
              <Form
                className="w-100"
                onSubmit={(event) => handleSubmitRegister(event)}
              >
                <Form.Group className="mb-3 col-12" controlId="formBasicEmail">
                  <Form.Label className="field-txt">
                    ชื่อ / First Name<span className="text-danger mx-2">*</span>
                  </Form.Label>
                  <Form.Control
                    name="name"
                    type="text"
                    placeholder="ชื่อ / First Name"
                    className="form-control-set"
                  />
                </Form.Group>
                <Form.Group className="mb-3 col-12" controlId="formBasicEmail">
                  <Form.Label className="field-txt">
                    นามสกุล / Last Name
                    <span className="text-danger mx-2">*</span>
                  </Form.Label>
                  <Form.Control
                    type="text"
                    name="lastname"
                    placeholder="นามสกุล / Last Name"
                    className="form-control-set"
                  />
                </Form.Group>
                <Form.Group className="mb-3 col-12" controlId="formBasicEmail">
                  <Form.Label className="field-txt">
                    หมายเลขบัตรประชาชน / Thai National ID Card{" "}
                    <span className="text-danger mx-2">*</span>
                  </Form.Label>
                  <Form.Control
                    type="text"
                    name="citizen_number"
                    placeholder="x-xxxx-xxxxx-xx-x"
                    className="form-control-set"
                  />
                </Form.Group>
                <Form.Group className="mb-2 col-12" controlId="formBasicEmail">
                  <Form.Label className="field-txt">
                    วัน/เดือน/ปี ค.ศ. เกิด / Date of birth{" "}
                    <span className="text-danger mx-2">*</span>
                  </Form.Label>
                  <DatePicker
                    className="form-control"
                    dateFormat="dd/MM/yyyy"
                    name="date_of_birth"
                    selected={dateOfBirth}
                    onChange={(date) => setDateOfBirth(date)}
                    placeholderText="dd/mm/yyyy"
                  />
                  {/* <Form.Control
										name="date_of_birth"
										type="date"
										// placeholder="dd/mm/yyyy"
										className="form-control-set"
									/> */}
                </Form.Group>
                <Form.Group className="mb-3 col-12" controlId="formBasicEmail">
                  <Form.Label className="field-txt">
                    อีเมล์ / Email<span className="text-danger mx-2">*</span>
                  </Form.Label>
                  <Form.Control
                    name="email"
                    type="text"
                    placeholder="อีเมล์ / Email"
                    className="form-control-set"
                  />
                </Form.Group>
                <p className="field-txt mb-2">
                  หมายเลขโทรศัพท์ / Phone number{" "}
                  <span className="text-danger mx-2">*</span>
                </p>
                <InputGroup className="mb-2 col-12">
                  <Form.Control
                    placeholder=""
                    name="phone_number"
                    aria-label="หมายเลขโทรศัพท์ / Phone number"
                    aria-describedby="basic-addon2"
                    className="form-control-set-file"
                  />
                  <Button
                    variant="outline-secondary"
                    id="button-addon2"
                    className="btn-OTP"
                    type="submit"
                  >
                    Request OTP
                  </Button>
                </InputGroup>
                <Form.Group className="mb-2 col-12" controlId="formBasicEmail">
                  <Form.Label className="field-txt">
                    รหัส OTP / OTP Number
                    <span className="text-danger mx-2">*</span>
                  </Form.Label>
                  <Form.Control
                    type="text"
                    onChange={(e) => setOTPNumber(e.target.value)}
                    placeholder="xxxxxx"
                    className="form-control-set"
                    disabled={!requestOTP}
                  />
                </Form.Group>
                <div className="row mt-4">
                  <div className="col-sm-6 col-12 mb-sm-4 mb-3 layout-radio_reg justify-content-start">
                    <label className="ci-bg-orange-V1 form-control">
                      <input
                        type="radio"
                        name="subject"
                        label="สมาชิกแสตมป์ไทย"
                        value="true"
                        onChange={() => setIsMember(true)}
                      />
                      <span className="ci-color-black-V1 text-detail_radio">
                        สมาชิกแสตมป์ไทย
                      </span>
                    </label>
                  </div>
                  <div className="col-sm-6 col-12 mb-4 layout-radio_reg">
                    <label className="ci-bg-orange-V1 form-control">
                      <input
                        type="radio"
                        name="subject"
                        label="ไม่ใช่สมาชิกแสตมป์ไทย"
                        value="true"
                        onChange={() => setIsMember(false)}
                      />
                      <span className="ci-color-black-V1 text-detail_radio">
                        ไม่ใช่สมาชิกแสตมป์ไทย
                      </span>
                    </label>
                  </div>
                </div>

                <div className="row my-4">
                  <div className="col-12">
                    {/* <Link href="/register/policy"> */}
                    <Button
                      className={`${
                        !requestOTP ? "btn-cancel" : "btn-save"
                      } w-100 btn mb-3`}
                      disabled={!requestOTP}
                      onClick={() => handleVerifySign()}
                    >
                      ยืนยันข้อมูล
                    </Button>
                    {/* </Link> */}
                  </div>
                  <div className="col-12">
                    <Button
                      className="btn-cancel w-100 btn"
                      onClick={props.onHide}
                    >
                      ยกเลิก
                    </Button>
                  </div>
                </div>
              </Form>
            </div>
          </div>
        </Modal.Body>
      </Modal>
      {/* </div> */}
    </>
  );
}
export default RegisterModal;
