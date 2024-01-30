/** @format */

import Link from "next/link";
import React, { useState, useRef } from "react";
import { Form, Button, InputGroup } from "react-bootstrap";
import { login, register, verifyOtp } from "../../../utils/apis/register-api";
import Router from "next/router";

import Swal from "sweetalert2";

import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

const Register = () => {
  const oPassword = useRef(null);
  const [textPassword, setTextPassword] = useState("แสดงรหัสผ่าน");
  const oPasswordConfirm = useRef(null);
  const [textPasswordConfirm, setTextPasswordConfirm] =
    useState("แสดงรหัสผ่าน");
  const handleShowPassword = async (e) => {
    if (e.current.type == "password") {
      if (e.current.name == "password") setTextPassword("ซ่อนรหัสผ่าน");
      if (e.current.name == "confirmPassword")
        setTextPasswordConfirm("ซ่อนรหัสผ่าน");
      e.current.type = "text";
    } else {
      if (e.current.name == "password") setTextPassword("แสดงรหัสผ่าน");
      if (e.current.name == "confirmPassword")
        setTextPasswordConfirm("แสดงรหัสผ่าน");
      e.current.type = "password";
    }
  };

  const mappingErrorMessage = {
    username: "ชื่อผู้ใช้",
    password: "รหัสผ่าน",
    confirmPassword: "ยืนยันรหัสผ่าน",
    firstname: "ชื่อ",
    lastname: "นามสกุล",
    citizen_number: "หมายเลขบัตรประชาชน",
    date_of_birth: "วัน/เดือน/ปี ค.ศ. เกิด",
    email: "อีเมล",
    phone_number: "เบอร์มือถือ",
    otp: "รหัส OTP",
  };

  const exceptValidateKeys = ["otp", "otpRef"];

  const [loading, setLoading] = useState(false);
  const [requestOTP, setRequestOTP] = useState(false);
  const [disable, setDisable] = useState(false);
  const [isMember, setIsMember] = useState(false);

  const [dateOfBirth, setDateOfBirth] = useState(new Date());
  const handleChangeDateOfBirth = async (date) => {
    setDateOfBirth(date);

    let y = date.getFullYear();
    let m = ("0" + (date.getMonth() + 1).toString()).slice(-2);
    let d = ("0" + date.getDate().toString()).slice(-2);
    let dateString = y + "-" + m + "-" + d;

    setRegisterInfo((prevState) => ({
      ...prevState,
      date_of_birth: dateString,
    }));
  };

  const [registerInfo, setRegisterInfo] = useState({
    username: "",
    password: "",
    confirmPassword: "",
    firstname: "",
    lastname: "",
    citizen_number: "",
    date_of_birth: "",
    email: "",
    phone_number: "",
    otp: "",
    otpRef: "",
  });

  const [formErrorMessage, setFormErrorMessage] = useState({
    username: "",
    password: "",
    confirmPassword: "",
    firstname: "",
    lastname: "",
    citizen_number: "",
    date_of_birth: "",
    email: "",
    phone_number: "",
    otp: "",
  });

  const handleChangeRegisterInfo = async (e) => {
    try {
      setRegisterInfo((prevState) => ({
        ...prevState,
        [e.target.name]: e.target.value,
      }));
    } catch {
      setRegisterInfo((prevState) => ({ ...prevState }));
    }
  };

  const handleValidateRegisterForm = async () => {
    try {
      let validated = true;
      for (const key of Object.keys(registerInfo)) {
        let errorMessage = "";

        if (!registerInfo[key]?.trim?.() && !exceptValidateKeys.includes(key)) {
          console.log(" == key ", key, registerInfo[key]?.trim?.());
          validated = false;
          errorMessage = `กรุณากรอก ${mappingErrorMessage[key]}`;
        }

        if (key === "email") {
          const emailReg = new RegExp(
            /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.){1,2}[a-zA-Z]{2,}))$/
          );

          if (
            registerInfo[key]?.trim?.() &&
            !emailReg.test(registerInfo[key])
          ) {
            errorMessage = `${mappingErrorMessage[key]} ไม่ถูกต้อง`;
          }
        }

        if (
          key === "phone_number" &&
          registerInfo[key]?.length &&
          registerInfo[key]?.length !== 10
        ) {
          errorMessage = `${mappingErrorMessage[key]} ไม่ถูกต้อง`;
        }

        if (key === "username") {
          let username = registerInfo[key];
          let usernameRegEx = /[^a-z\d]/;
          if (usernameRegEx.test(username)) {
            errorMessage = `${mappingErrorMessage[key]} ไม่ถูกต้อง กรุณากรอกเป็นตัวอักษรภาษาอังกฤษพิมพ์เล็กหรือตัวเลขเท่านั้น`;
          }
        }

        setFormErrorMessage((prevState) => ({
          ...prevState,
          [key]: errorMessage,
        }));
      }
      return validated;
    } catch {
      return false;
    }
  };

  const handleValidatePassword = async () => {
    try {
      let validated = true;

      const validation = checkPasswordValidation(
        registerInfo.password.trim(),
        registerInfo.confirmPassword.trim()
      );

      if (validation) {
        validated = false;
        setFormErrorMessage((prevState) => ({
          ...prevState,
          password: validation,
        }));
      }

      if (registerInfo.confirmPassword.trim().length) {
        if (
          registerInfo.password.trim() !== registerInfo.confirmPassword.trim()
        ) {
          validated = false;
          setFormErrorMessage((prevState) => ({
            ...prevState,
            confirmPassword: "ยืนยันรหัสผ่านและรหัสผ่านต้องเหมือนกัน",
          }));
        }
      }

      return validated;
    } catch {
      return false;
    }
  };

  const checkPasswordValidation = (value, valueAgain) => {
    if (value !== valueAgain) {
      return "รหัสผ่านและยืนยันรหัสผ่านต้องเหมือนกัน";
    } else {
      const isWhitespace = /^(?=.*\s)/;
      if (isWhitespace.test(value)) {
        return "รหัสผ่านไม่สามารถเว้นวรรคได้";
      }

      const isContainsUppercase = /^(?=.*[A-Z])/;
      if (!isContainsUppercase.test(value)) {
        return "รหัสผ่านต้องประกอบด้วยอักษรตัวใหญ่อย่างน้อย 1 ตัว";
      }

      const isContainsNumber = /^(?=.*[0-9])/;
      if (!isContainsNumber.test(value)) {
        return "รหัสผ่านต้องประกอบด้วยอักษรตัวเลขอย่างน้อย 1 ตัว";
      }

      const isContainsSymbol = /^(?=.*[~`!@#$%^&*()--+={}\[\]|\\:;"'<>,.?/_₹])/;
      if (!isContainsSymbol.test(value)) {
        return "รหัสผ่านต้องประกอบด้วยอักขระพิเศษอย่างน้อย 1 ตัว";
      }

      const isValidLength = /^.{10,16}$/;
      if (!isValidLength.test(value)) {
        return "รหัสผ่านต้องมีความยาวระหว่าง 10 ถึง 16 ตัวอักษร";
      }
    }

    return null;
  };

  const handleRequestOTP = async () => {
    console.log("%c === handleRequestOTP ", "color: yellow");
    let response;
    try {
      setLoading(true);

      let validated_form = await handleValidateRegisterForm();
      let validated_pass = await handleValidatePassword();

      console.log("validated_form", validated_form);
      console.log("validated_pass", validated_pass);

      if (!validated_form || !validated_pass) {
        Swal.fire("", `กรุณากรอกฟอร์มให้ถูกต้อง`, "warning");
        return;
      }

      const { firstname, ...formDetail } = registerInfo;

      formDetail.name = firstname;
      formDetail.is_member = isMember;

      // response = await register(formDetail);

      const verifyUser = await fetch("/api/verify_user", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(formDetail),
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
      response = await fetch("/api/register", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(formDetail),
      });
      response = await response.json();

      if (response.resp?.statusCode !== 201) {
        if (response.resp?.response?.data?.includes("phone_number")) {
          await Swal.fire(
            "",
            `หมายเลขโทรศัพท์นี้ได้ใช้ลงทะเบียนไปแล้ว`,
            "warning"
          );
        } else if (response.resp?.response?.data?.includes("citizen_number")) {
          await Swal.fire(
            "",
            `หมายเลขบัตรประชาชนนี้ได้ใช้ลงทะเบียนไปแล้ว`,
            "warning"
          );
        }
        return;
      }

      setRequestOTP(true);

      // console.log(" === response.resp?.response?.data ", response.resp?.response?.data)
    } catch (error) {
      console.log(error);
    } finally {
      setRegisterInfo((prevState) => ({
        ...prevState,
        otpRef: response?.data?.otpRef || null,
      }));
      setLoading(false);
    }
  };

  const handleSubmitRegister = async () => {
    try {
      setDisable(true);
      setLoading(true);

      if (!registerInfo.otp.trim()) {
        setFormErrorMessage((prevState) => ({
          ...prevState,
          otp: "กรุณากรอก OTP",
        }));
        return;
      }

      let response = await fetch("/api/verify_otp", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          phone_number: registerInfo.phone_number,
          otp_ref: registerInfo.otpRef,
          otp_number: registerInfo.otp,
        }),
      });

      response = await response.json();

      // const response = await verifyOtp({
      // 	phone_number: registerInfo.phone_number,
      // 	otp_ref: registerInfo.otpRef,
      // 	otp_number: registerInfo.otp,
      // });

      if (response.status) {
        let responseLogin = await fetch("/api/signin_join", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            username: registerInfo.username,
            password: registerInfo.password,
          }),
        });

        responseLogin = await responseLogin.json();

        // const responseLogin = await login({
        // 	username: registerInfo.username,
        // 	password: registerInfo.password,
        // });

        window.sessionStorage.setItem(
          "authentication",
          JSON.stringify({
            login_type: "jnft_wallet",
            access_token: responseLogin.data.accessToken || null,
          })
        );

        if (responseLogin.data.accessToken) {
          Router.push("/register/policy");
        }
      }

      setDisable(!response.status);
    } catch {
    } finally {
      setDisable(false);
      setLoading(false);
    }
  };

  return (
    <section className="layout_register-components">
      <div className="row">
        <div className="col-lg-12 text-center d-lg-block d-none">
          <img src="../../assets/image/logo.svg" className="iconlogo_reg" />
          <img
            src="../../assets/image/JNFT_LOGO.svg"
            className="iconlogo_JKNFT"
          />
          <h2 className="txt-set-detail-JNFT mt-4">Register JNFT wallet</h2>
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
          <h2 className="txt-set-detail-JNFT mt-4">Register JNFT wallet</h2>
        </div>
      </div>

      <div className="row d-flex justify-content-center field-group">
        <div className="col-12 col-lg-7 px-lg-0 px-5">
          <Form autoComplete={false}>
            <Form.Group className="mb-3 col-12">
              <Form.Label className="field-txt">
                ชื่อผู้ใช้ / Username{" "}
                <span className="text-danger mx-2">*</span>
              </Form.Label>
              <Form.Control
                type="text"
                name="username"
                placeholder="ชื่อผู้ใช้ / Username"
                className={`form-control-set ${
                  formErrorMessage.username ? "is-invalid" : ""
                }`}
                value={registerInfo.username}
                disabled={loading}
                onChange={handleChangeRegisterInfo}
              />
              <small className="text-danger">{formErrorMessage.username}</small>
            </Form.Group>
            <Form.Group className="mb-3 col-12">
              <Form.Label className="field-txt">
                รหัสผ่าน / Password <span className="text-danger mx-2">*</span>
              </Form.Label>
              <div className="d-flex justify-content-center align-items-center">
                <Form.Control
                  ref={oPassword}
                  type="password"
                  name="password"
                  placeholder="รหัสผ่าน / Password"
                  className={`form-control-set ${
                    formErrorMessage.password ? "is-invalid" : ""
                  }`}
                  value={registerInfo.password}
                  disabled={loading}
                  onChange={handleChangeRegisterInfo}
                />
                <span
                  className="px-2 text-primary cursor-pointer"
                  onClick={() => {
                    handleShowPassword(oPassword);
                  }}
                  style={{ fontSize: "14px", whiteSpace: "nowrap" }}
                >
                  {textPassword}
                </span>
              </div>
              <small className="text-danger">{formErrorMessage.password}</small>
              <p>
                <small className="text-2">
                  รหัสผ่านต้องความยาวขั้นต่ำ 10 หลัก
                  ประกอบด้วยตัวอักษรภาษาอังกฤษมีพิมพ์เล็ก พิมพ์ใหญ่
                  ตัวอักษรพิเศษและตัวเลขผสมกัน
                </small>
              </p>
            </Form.Group>
            <Form.Group className="mb-3 col-12">
              <Form.Label className="field-txt">
                ยืนยันรหัสผ่าน / Confirm Password
                <span className="text-danger mx-2">*</span>
              </Form.Label>
              <div className="d-flex justify-content-center align-items-center">
                <Form.Control
                  ref={oPasswordConfirm}
                  type="password"
                  name="confirmPassword"
                  placeholder="ยืนยันรหัสผ่าน / Confirm Password"
                  className={`form-control-set ${
                    formErrorMessage.confirmPassword ? "is-invalid" : ""
                  }`}
                  value={registerInfo.confirmPassword}
                  disabled={loading}
                  onChange={handleChangeRegisterInfo}
                />
                <span
                  className="px-2 text-primary cursor-pointer"
                  onClick={() => {
                    handleShowPassword(oPasswordConfirm);
                  }}
                  style={{ fontSize: "14px", whiteSpace: "nowrap" }}
                >
                  {textPasswordConfirm}
                </span>
              </div>
              <small className="text-danger">
                {formErrorMessage.confirmPassword}
              </small>
            </Form.Group>

            <Form.Group className="mb-3 col-12">
              <Form.Label className="field-txt">
                ชื่อ / First Name<span className="text-danger mx-2">*</span>
              </Form.Label>
              <Form.Control
                type="text"
                name="firstname"
                placeholder="ชื่อ / First Name"
                className={`form-control-set ${
                  formErrorMessage.firstname ? "is-invalid" : ""
                }`}
                value={registerInfo.firstname}
                disabled={loading}
                onChange={handleChangeRegisterInfo}
              />
              <small className="text-danger">
                {formErrorMessage.firstname}
              </small>
            </Form.Group>
            <Form.Group className="mb-3 col-12">
              <Form.Label className="field-txt">
                นามสกุล / Last Name<span className="text-danger mx-2">*</span>
              </Form.Label>
              <Form.Control
                type="text"
                name="lastname"
                placeholder="นามสกุล / Last Name"
                className={`form-control-set ${
                  formErrorMessage.lastname ? "is-invalid" : ""
                }`}
                value={registerInfo.lastname}
                disabled={loading}
                onChange={handleChangeRegisterInfo}
              />
              <small className="text-danger">{formErrorMessage.lastname}</small>
            </Form.Group>
            <Form.Group className="mb-3 col-12">
              <Form.Label className="field-txt">
                หมายเลขบัตรประชาชน / Passport ID{" "}
                <span className="text-danger mx-2">*</span>
              </Form.Label>
              <Form.Control
                type="text"
                name="citizen_number"
                placeholder="x-xxxx-xxxxx-xx-x"
                className={`form-control-set ${
                  formErrorMessage.citizen_number ? "is-invalid" : ""
                }`}
                value={registerInfo.citizen_number}
                disabled={loading}
                onChange={handleChangeRegisterInfo}
              />
              <small className="text-danger">
                {formErrorMessage.citizen_number}
              </small>
            </Form.Group>
            <Form.Group className="mb-2 col-12">
              <Form.Label className="field-txt">
                วัน/เดือน/ปี ค.ศ. เกิด / Date of birth
                <span className="text-danger mx-2">*</span>
                {/* {registerInfo.date_of_birth} */}
              </Form.Label>
              <DatePicker
                className="form-control"
                dateFormat="dd/MM/yyyy"
                selected={dateOfBirth}
                onChange={(date) => handleChangeDateOfBirth(date)}
                placeholderText="dd/mm/yyyy"
                disabled={loading}
              />
              {/* <Form.Control
								type="date"
								name="date_of_birth"
								// placeholder="dd/mm/yyyy"
								className={`form-control-set ${formErrorMessage.date_of_birth ? "is-invalid" : ""}`}
								value={registerInfo.date_of_birth}
								disabled={loading}
								onChange={handleChangeRegisterInfo}
							/> */}
              <small className="text-danger">
                {formErrorMessage.date_of_birth}
              </small>
            </Form.Group>
            <Form.Group className="mb-3 col-12">
              <Form.Label className="field-txt">
                Email<span className="text-danger mx-2">*</span>
              </Form.Label>
              <Form.Control
                type="text"
                name="email"
                placeholder="Email"
                className={`form-control-set ${
                  formErrorMessage.email ? "is-invalid" : ""
                }`}
                value={registerInfo.email}
                disabled={loading}
                onChange={handleChangeRegisterInfo}
              />
              <small className="text-danger">{formErrorMessage.email}</small>
            </Form.Group>
            <p className="field-txt">
              เบอร์มือถือ / Phone number
              <span className="text-danger mx-2">*</span>
            </p>
            <Form.Group className="mb-3">
              <InputGroup className="col-12 mb-0">
                <Form.Control
                  name="phone_number"
                  placeholder="เบอร์มือถือ / Phone number"
                  aria-label="เบอร์มือถือ"
                  className={`form-control-set-file ${
                    formErrorMessage.phone_number ? "is-invalid" : ""
                  }`}
                  value={registerInfo.phone_number}
                  disabled={loading}
                  onChange={handleChangeRegisterInfo}
                />
                <Button
                  variant="outline-secondary"
                  id="button-addon2"
                  className="btn-OTP"
                  onClick={handleRequestOTP}
                >
                  Request OTP
                </Button>
              </InputGroup>
              <small className="text-danger">
                {formErrorMessage.phone_number}
              </small>
            </Form.Group>
            <Form.Group className="mb-2 col-12">
              <Form.Label className="field-txt">
                รหัส OTP / OTP Number<span className="text-danger mx-2">*</span>
              </Form.Label>
              <Form.Control
                type="text"
                name="otp"
                placeholder="xxxxxx"
                className={`form-control-set ${
                  formErrorMessage.otp ? "is-invalid" : ""
                }`}
                value={registerInfo.otp}
                disabled={loading || !requestOTP}
                onChange={handleChangeRegisterInfo}
              />
              <small className="text-danger">{formErrorMessage.otp}</small>
            </Form.Group>
            <div className="row mt-4">
              <div className="col-12 col-md-auto mb-2 me-md-4 layout-radio_reg">
                <label className="ci-bg-orange-V1 form-control d-flex align-items-center">
                  <input
                    type="radio"
                    name="subject"
                    label="สมาชิกแสตมป์ไทย"
                    value="true"
                    onChange={() => setIsMember(true)}
                  />{" "}
                  <span className="ci-color-black-V1 text-detail_radio">
                    สมาชิกแสตมป์ไทย
                    <br className="d-none d-md-block" />
                    Thai stamp member
                  </span>
                </label>
              </div>
              <div className="col-12 col-md mb-2 layout-radio_reg">
                <label className="ci-bg-orange-V1 form-control d-flex align-items-center">
                  <input
                    type="radio"
                    name="subject"
                    label="ไม่ใช่สมาชิกแสตมป์ไทย"
                    value="true"
                    onChange={() => setIsMember(false)}
                  />{" "}
                  <span className="ci-color-black-V1 text-detail_radio">
                    ไม่ใช่สมาชิกแสตมป์ไทย
                    <br className="d-none d-md-block" />
                    Not a Thai stamp member
                  </span>
                </label>
              </div>
            </div>
            <div className="row my-3">
              <div className="col-md-4 col-12 mb-md-0 mb-3">
                <Link href="/">
                  <button className="btn-cancel w-100 btn">ยกเลิก</button>
                </Link>
              </div>
              <div className="col-md-8 col-12">
                <button
                  className="btn-save w-100 btn"
                  disabled={loading || disable || !requestOTP}
                  onClick={handleSubmitRegister}
                >
                  ถัดไป
                </button>
              </div>
            </div>
          </Form>
        </div>
      </div>
    </section>
  );
};

export default Register;
