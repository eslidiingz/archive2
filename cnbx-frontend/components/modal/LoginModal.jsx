/** @format */

import Loader from "/components/layouts/Loader";
import { useCallback, useEffect, useRef, useState, useMemo } from "react";
import Link from "next/link";
import { useTranslation, Trans } from "next-i18next";
import Router from "next/router";
import { useRouter } from "next/router";
import Swal from "sweetalert2";
import { ethers } from "ethers";
import {
  Container,
  Form,
  FormControl,
  Nav,
  Navbar,
  NavDropdown,
  Button,
  Dropdown,
  DropdownButton,
  InputGroup,
  Modal,
} from "react-bootstrap";

import { login } from "/utils/apis/register-api";

import "react-datepicker/dist/react-datepicker.css";

function LoginModal(props) {
  // const usernameRef = useRef(null);
  // const passwordRef = useRef(null);
  const router = useRouter();
  const { t } = useTranslation("common");

  const oPassword = useRef(null);
  const [textPassword, setTextPassword] = useState(false);

  const nPassword = useRef(null);
  const [textNewPassword, setTextNewPassword] = useState(false);

  const nPasswordConfirm = useRef(null);
  const [textNewPasswordConfirm, setTextPNewPasswordConfirm] = useState(false);

  const [isSendOtp, setIsSendOtp] = useState(false);
  const [otpData, setOtpData] = useState({
    reset_code: null,
    phone_number: null,
    otp_ref: null,
  });
  const citizenNumber = useRef(null);
  const phoneNumber = useRef(null);
  const otpNumber = useRef(null);
  const getCitizenNumber = useRef(null);
  const getPhoneNumber = useRef(null);

  const [accountUsername, setAccountUsername] = useState("ไม่พบข้อมูล");

  const handleShowPassword = async (e) => {
    if (e.current.type == "password") {
      if (e.current.name == "password") setTextPassword(true);
      if (e.current.name == "newPassword") setTextNewPassword(true);
      if (e.current.name == "confirmNewPassword")
        setTextPNewPasswordConfirm(true);
      e.current.type = "text";
    } else {
      if (e.current.name == "password") setTextPassword(false);
      if (e.current.name == "newPassword") setTextNewPassword(false);
      if (e.current.name == "confirmNewPassword")
        setTextPNewPasswordConfirm(false);
      e.current.type = "password";
    }
  };

  const [username, setUsername] = useState();
  const [password, setPassword] = useState();

  const [loginStep, setLoginStep] = useState("stepLoginType");

  const handleCloseModal = () => {
    props.onHide();
    setLoginStep("stepLoginType");
  };

  const signinMetamask = async () => {
    setLoginStep("stepCheckAccount");
    try {
      const provider = new ethers.providers.Web3Provider(window.ethereum);
      const signer = provider.getSigner();
      await provider.send("eth_requestAccounts", []);
      const address = await signer.getAddress();

      const msg = `Version: 1\r\nLogin With Address: ${address}\r\n`;

      const signature = await signer.signMessage(msg);

      const response = await fetch(`/api/signin_metamask`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ address, signature }),
      });

      const resSigninMetamask = await response.json();

      console.log(
        "%c === resSigninMetamask ",
        "color: yellow",
        resSigninMetamask
      );

      if (response.status !== 200) {
        setLoginStep("stepLoginerror");
        return;
      }

      sessionStorage.setItem(
        "authentication",
        JSON.stringify({
          login_type: "metamask",
          access_token: resSigninMetamask?.data?.access_token,
        })
      );

      props.fetchUserAccept();
      handleCloseModal();
      // Router.reload();
    } catch (error) {
      console.log(" === signinMetamask", error);
      handleCloseModal();
    }
  };

  const handleValidateCredential = async () => {
    try {
      if (!username.trim?.() || !password.trim?.()) {
        return false;
      }

      return true;
    } catch (error) {
      return false;
    }
  };

  const handleLogin = async () => {
    try {
      setLoginStep("stepCheckAccount");
      let validated = await handleValidateCredential();

      if (!validated) {
        // setLoginStep("stepLoginerror");
        Swal.fire("", "กรุณากรอกชื่อผู้ใช้และรหัสผ่าน", "warning");
        //   return;
        return;
        //   Swal.fire("", "กรุณากรอกชื่อผู้ใช้และรหัสผ่าน", "warning");
        //   return;
      }

      // const responseLogin = await login({
      //   username: username,
      //   password: password,
      // });

      let responseLogin = await fetch("/api/signin_join", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          username: username,
          password: password,
        }),
      });

      responseLogin = await responseLogin.json();

      if (responseLogin.status) {
        setLoginStep("stepLoginType");
        window.sessionStorage.setItem(
          "authentication",
          JSON.stringify({
            login_type: "jnft_wallet",
            access_token: responseLogin.data.accessToken || null,
          })
        );
        Router.reload();
      } else {
        Swal.fire("", "กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่าน", "warning");
        handleCloseModal();
        return;
      }
    } catch (error) {
      console.log(error);
      // setLoginStep("stepLoginerror");
      Swal.fire("", "กรุณาตรวจสอบชื่อผู้ใช้และรหัสผ่าน", "warning");
      handleCloseModal();
      return;
    }
  };

  const handleRequestOtp = async () => {
    if (!citizenNumber.current.value || !phoneNumber.current.value) {
      Swal.fire("", "กรุณากรอกข้อมูล", "error");
      return;
    }
    setIsSendOtp(true);
    try {
      const bodyRequest = {
        phone_number: phoneNumber.current.value,
        citizen_number: citizenNumber.current.value,
      };
      console.log(bodyRequest);
      const response = await fetch(`/api/forgot_password`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(bodyRequest),
      });
      const result = await response.json();
      const { data } = result;
      if (data?.statusCode === 201) {
        const res = data.response.data;
        setOtpData(res);
      } else {
        Swal.fire("", "ไม่สามารถส่ง OTP ได้", "error");
        return;
      }
    } catch (error) {
      Swal.fire("", "ไม่สามารถส่ง OTP ได้", "error");
      return;
    }
  };
  const handelVerifyOtp = async () => {
    try {
      if (!otpNumber.current.value) {
        Swal.fire("", "กรุณากรอกเลข OTP", "error");
        return;
      }
      const bodyRequest = otpData;
      bodyRequest.otp_number = otpNumber.current.value;

      const response = await fetch(`/api/verify_forgot_password`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(bodyRequest),
      });
      const { data } = await response.json();

      if (data.statusCode === 201) {
        setLoginStep("stepResetPassword");
      } else {
        // fail to verify
        Swal.fire("", "หมายเลข OTP ไม่ถูกต้อง", "error");
        return;
      }
    } catch (error) {
      Swal.fire("", "รหัส OTP ผิดกรุณาขอ OTP ใหม่อีกครั้ง", "error");
      return;
    }
  };
  const handelResetPassword = async () => {
    try {
      const password = nPassword.current.value;
      const passwordConfirm = nPasswordConfirm.current.value;
      const validate = checkPasswordValidation(
        password.trim(),
        passwordConfirm.trim()
      );

      if (!password || !passwordConfirm || validate) {
        Swal.fire("", validate, "error");
        return;
      }

      console.log(!password || !passwordConfirm || !validate);
      const bodyRequest = {
        reset_code: otpData.reset_code,
        password: password,
      };
      const response = await fetch(`/api/reset_password`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(bodyRequest),
      });
      const { data } = await response.json();
      if (data?.statusCode === 201) {
        setLoginStep("resetPasswordDone");
      } else {
        Swal.fire("", "ไม่สามารถเปลี่ยนรหัสผ่านได้", "error");
        return;
      }
    } catch (error) {
      Swal.fire("", "ไม่สามารถเปลี่ยนรหัสผ่านได้", "error");
      return;
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

  const handleSearchUsername = async () => {
    if (!getCitizenNumber.current.value || !getPhoneNumber.current.value) {
      Swal.fire("", "กรุณากรอกข้อมูล", "error");
      return;
    }

    try {
      const bodyRequest = {
        phone_number: getPhoneNumber.current.value,
        citizen_number: getCitizenNumber.current.value,
      };
      const response = await fetch(`/api/get_account`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(bodyRequest),
      });
      const result = await response.json();
      console.log(result);
      const { data } = result;
      if (data?.statusCode === 201) {
        const res = data?.response?.data?.username;
        setAccountUsername(res);
      } else {
        setAccountUsername("ไม่พบชื่อผู้ใช้งาน");
        return;
      }
    } catch (error) {
      Swal.fire("", "ไม่สามารถส่ง OTP ได้", "error");
      return;
    }
  };
  return (
    <>
      <Modal
        show={props.show}
        onHide={props.onHide}
        backdrop="static"
        keyboard={false}
        aria-labelledby="contained-modal-title-vcenter"
        centered
      >
        {loginStep == "stepLoginType" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header">
                    <i className="login-icon me-2"></i>
                    {t("menu.Login")}
                  </h4>
                  <p className="subheader">{t("menu.LoginModaltxt1")}</p>
                </div>
                <div className="col-right">
                  <Button variant="close-modal" onClick={props.onHide}></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <div className="login-choice">
                  <Button variant="login-card" onClick={() => setLoginStep("stepJoinlogin")}>
                    <img className="login-card-img" src="/assets/image/icon/logo-jnft.png" />
                    <p>
                      เข้าสู่ระบบด้วย
                      <br />
                      JNFT Wallet
                    </p>
                  </Button>
                  <Button variant="login-card" onClick={() => signinMetamask()}>
                    <img className="login-card-img" src="/assets/image/icon/MetamaskLogo.svg" />
                    <p>
                      เข้าสู่ระบบด้วย
                      <br />
                      Metamask
                    </p>
                  </Button>
                </div>
                <p className="text-center mt-4">
                  {t("menu.LoginModaltxt2")}{" "}
                  <Link href="/register">
                    <a className="text-primary">{t("menu.Register")}</a>
                  </Link>{" "}
                  {t("menu.LoginModaltxt3")}
                </p>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}

        {loginStep == "stepCheckAccount" ? (
          <>
           <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header"> {t("menu.LoginModaltxt6")}</h4>
                </div>
              </div>
              <div className="tps-modal-body">
                <Loader />
                <h4 className="text-center"> {t("menu.LoginModaltxt7")}</h4>
                <p className="text-center">{t("menu.LoginModaltxt8")}</p>
              </div>
            </div>
          </>
        ) : (
          <></>
          // <>{console.log(registerStep)}</>
        )}

        {loginStep == "stepJoinlogin" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header"> {t("menu.LoginModaltxt4")}</h4>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={handleCloseModal}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <Form className="w-100">
                  <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label>
                      ชื่อผู้ใช้งาน / Username
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control
                      type="text"
                      placeholder=""
                      className="form-control-set"
                      onChange={(e) => setUsername(e.target.value)}
                    />
                    {/* <Form.Text className="text-muted">We'll never share your email with anyone else.</Form.Text> */}
                  </Form.Group>

                  <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>
                      รหัสผ่าน / Password
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>

                    <InputGroup className="col-12 mb-0">
                      <Form.Control
                        ref={oPassword}
                        type="password"
                        name="password"
                        placeholder=""
                        className="form-control-set"
                        onChange={(e) => setPassword(e.target.value)}
                      />
                      <Button
                        variant="dark"
                        onClick={() => {
                          handleShowPassword(oPassword);
                        }}
                      >
                        {textPassword ? (
                          <>
                            <div className="d-flex align-items-center nowarp">
                              <i className="fas fa-eye-slash me-md-2"></i>
                              <span className="d-none d-md-block">
                              {t("menu.LoginModaltxt13")}
                              </span>
                            </div>
                          </>
                        ) : (
                          <>
                            <div className="d-flex align-items-center nowarp">
                              <i className="fas fa-eye me-md-2"></i>
                              <span className="d-none d-md-block">
                              {t("menu.LoginModaltxt14")}
                              </span>
                            </div>
                          </>
                        )}
                      </Button>
                    </InputGroup>
                  </Form.Group>

                  <div className="row">
                    <div className="col me-auto pb-2">
                      {/* <Form.Group
                        className="mb-3"
                        controlId="formBasicCheckbox"
                      >
                        <Form.Check type="checkbox" label="จดจำฉันไว้" />
                      </Form.Group> */}
                      <a
                        className="text-primary cursor-pointer "
                        onClick={() => setLoginStep("stepsearchusername")}
                      >
                         {t("menu.Search")}
                      </a>
                    </div>
                    <div className="col-auto ms-auto">
                      <a
                        className="text-primary cursor-pointer "
                        onClick={() => setLoginStep("stepforgotPassword")}
                      >
                         {t("menu.Password")}
                      </a>
                    </div>
                  </div>
                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100"
                    onClick={handleLogin}
                  >
                       {t("menu.Login")}
                  </Button>
                </Form>
                <p className="text-center mt-4">
                  {t("menu.LoginModaltxt2")}{" "}
                  <Link href="/register">
                    <a className="text-primary">{t("menu.Register")}</a>
                  </Link>{" "}
                  {t("menu.LoginModaltxt3")}
                </p>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}

        {loginStep == "stepsearchusername" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header"> {t("menu.Search")}</h4>
                  <p className="txt-password">
                  {t("menu.LoginModaltxt9")}
                  </p>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={handleCloseModal}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <Form className="w-100">
                  <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label>
                      หมายเลขบัตรประจำตัวประชาชน / Thai Number ID
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control
                      ref={getCitizenNumber}
                      type="text"
                      name="getCitizenNumber"
                      placeholder=""
                      className="form-control-set"
                    />
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="">
                    <Form.Label>
                      เบอร์มือถือ / Mobile Number
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control
                      ref={getPhoneNumber}
                      type="text"
                      name="getPhoneNumber"
                      placeholder=""
                      className="form-control-set"
                    />
                  </Form.Group>

                  <Form.Group className="mb-3" controlId="">
                    <Form.Label>ชื่อผู้ใช้งาน</Form.Label>
                    <Form.Control
                      type="text"
                      placeholder=""
                      className="form-control-set"
                      disabled={true}
                      value={accountUsername}
                    />
                  </Form.Group>

                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100"
                    onClick={() => handleSearchUsername()}
                  >
                     {t("menu.Search")}
                  </Button>
                </Form>

                <p className="text-center mt-4">
                  {t("menu.LoginModaltxt2")}{" "}
                  <Link href="/register">
                    <a className="text-primary">{t("menu.Register")}</a>
                  </Link>{" "}
                  {t("menu.LoginModaltxt3")}
                </p>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}

        {loginStep == "stepforgotPassword" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header">{t("menu.Password")}</h4>
                  <p className="txt-password">
                  {t("menu.LoginModaltxt10")}
                  </p>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={handleCloseModal}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <Form className="w-100">
                  <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label>
                      หมายเลขบัตรประจำตัวประชาชน / Thai Number ID
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control
                      ref={citizenNumber}
                      type="text"
                      name="username"
                      placeholder=""
                      className="form-control-set"
                    />
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="">
                    <Form.Label>
                      เบอร์มือถือ / Mobile Number
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <InputGroup className="col-12 mb-0">
                      <Form.Control
                        ref={phoneNumber}
                        type="text"
                        placeholder=""
                        name="phone"
                      />
                      <Button
                        variant="primary"
                        onClick={() => handleRequestOtp()}
                      >
                        Request OTP
                      </Button>
                    </InputGroup>
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="">
                    <Form.Label>
                      รหัส OTP / OTP Number
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control
                      ref={otpNumber}
                      type="text"
                      placeholder=""
                      className="form-control-set"
                    />
                  </Form.Group>

                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100"
                    onClick={() => handelVerifyOtp()}
                    disabled={!isSendOtp}
                  >
                    รีเซ็ตรหัสผ่าน
                  </Button>
                </Form>
                <p className="text-center mt-4">
                  {t("menu.LoginModaltxt2")}{" "}
                  <Link href="/register">
                    <a className="text-primary">{t("menu.Register")}</a>
                  </Link>{" "}
                  {t("menu.LoginModaltxt3")}
                </p>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}

        {loginStep == "stepResetPassword" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header">{t("menu.LoginModaltxt11")}</h4>
                  <p className="txt-password">
                  {t("menu.LoginModaltxt12")}
                  </p>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={handleCloseModal}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <Form className="w-100">
                  <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>
                      รหัสผ่านใหม่ / New password
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>

                    <InputGroup className="col-12 mb-0">
                      <Form.Control
                        ref={nPassword}
                        type="password"
                        name="newPassword"
                        placeholder=""
                        className="form-control-set"
                        onChange={(e) => setPassword(e.target.value)}
                      />
                      <Button
                        variant="dark"
                        onClick={() => {
                          handleShowPassword(nPassword);
                        }}
                      >
                        {textNewPassword ? (
                          <>
                            <div className="d-flex align-items-center nowarp">
                              <i className="fas fa-eye-slash me-md-2"></i>
                              <span className="d-none d-md-block">
                              {t("menu.LoginModaltxt13")}
                              </span>
                            </div>
                          </>
                        ) : (
                          <>
                            <div className="d-flex align-items-center nowarp">
                              <i className="fas fa-eye me-md-2"></i>
                              <span className="d-none d-md-block">
                              {t("menu.LoginModaltxt14")}
                              </span>
                            </div>
                          </>
                        )}
                      </Button>
                    </InputGroup>
                  </Form.Group>

                  <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>
                      ยืนยันรหัสผ่าน / Confirm New Password
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>

                    <InputGroup className="col-12 mb-0">
                      <Form.Control
                        ref={nPasswordConfirm}
                        type="password"
                        name="confirmNewPassword"
                        placeholder=""
                        className="form-control-set"
                        onChange={(e) => setPassword(e.target.value)}
                      />
                      <Button
                        variant="dark"
                        onClick={() => {
                          handleShowPassword(nPasswordConfirm);
                        }}
                      >
                        {textNewPasswordConfirm ? (
                          <>
                            <div className="d-flex align-items-center nowarp">
                              <i className="fas fa-eye-slash me-md-2"></i>
                              <span className="d-none d-md-block">
                              {t("menu.LoginModaltxt13")}
                              </span>
                            </div>
                          </>
                        ) : (
                          <>
                            <div className="d-flex align-items-center nowarp">
                              <i className="fas fa-eye me-md-2"></i>
                              <span className="d-none d-md-block">
                              {t("menu.LoginModaltxt14")}
                              </span>
                            </div>
                          </>
                        )}
                      </Button>
                    </InputGroup>
                  </Form.Group>

                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100"
                    onClick={() => handelResetPassword()}
                  >
                   {t("menu.LoginModaltxt11")}
                  </Button>
                </Form>
                <p className="text-center mt-4">
                  {t("menu.LoginModaltxt2")}{" "}
                  <Link href="/register">
                    <a className="text-primary">{t("menu.Register")}</a>
                  </Link>{" "}
                  {t("menu.LoginModaltxt3")}
                </p>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}

        {loginStep == "resetPasswordDone" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header"> {t("menu.LoginModaltxt15")}</h4>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={handleCloseModal}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body mt-4">
                <img
                  className="mx-2 text-center"
                  src="../../assets/image/reset-done.svg"
                />
                <div className="mt-3 w-100">
                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100 my-2"
                    onClick={() => setLoginStep("stepJoinlogin")}
                  >
                     {t("menu.Login")}
                  </Button>
                  <Button
                    variant="secondary"
                    size="lg"
                    className="w-100 my-2"
                    onClick={handleCloseModal}
                  >
                     {t("menu.LoginModaltxt16")}
                  </Button>
                </div>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}

        {loginStep == "stepVerifyEmail" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">เกิดข้อผิดพลาด</h4>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={props.onClose}
                  ></Button>
                </div>
              </div>

              <div className="tps-modal-body my-4">
                <img
                  className="mx-2 text-center"
                  src="../../assets/image/icon/027---Email-Tick.svg"
                />
                <p className="txt-password text-center mt-2">
                  เราได้ส่งลิงค์สำหรับรีเซ็ตรหัสผ่านไปยังอีเมลของ คุณแล้ว
                  กรุณากดดำเนินการต่อบนอีเมลของคุณ
                </p>
                <div className="mt-5">
                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100 my-2"
                    disabled
                  >
                    ไม่ได้รับอีเมล แจ้งอีเมลใหม่อีกครั้ง
                  </Button>
                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100 my-2"
                    onClick={handleCloseModal}
                  >
                    ปิดหน้านี้
                  </Button>
                </div>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}

        {loginStep == "stepLoginerror" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">เกิดข้อผิดพลาด</h4>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={props.onClose}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <img
                  className="modal-msg-img mb-4"
                  src="/assets/image/icon/message.svg"
                />
                <h4 className="text-center">ไม่สามารถ Login ได้</h4>
                <Button
                  variant="secondary"
                  size="lg"
                  className="w-100"
                  onClick={handleCloseModal}
                >
                  ปิดหน้านี้
                </Button>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
      </Modal>
    </>
  );
}
export default LoginModal;
