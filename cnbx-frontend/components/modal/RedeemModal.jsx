import Link from "next/link";
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
import { useEffect, useRef, useState } from "react";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import Loader from "../layouts/Loader";

function LoginModal(props) {
  const [show, setShow] = useState(false);
  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);
  const [redeemStep, setRedeemStep] = useState("stepChecklogin");

  const onClosemodal = () => {
    setShow(false);
    setRedeemStep("stepChecklogin");
  };

  const [startDate, setStartDate] = useState(new Date());

  return (
    <>
      <Modal
        show={props.show}
        onHide={props.onClose}
        backdrop="static"
        keyboard={false}
        aria-labelledby="contained-modal-title-vcenter"
        centered
      >
        {redeemStep == "stepChecklogin" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">กำลังตรวจสอบข้อมูล</h4>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={props.onClose}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <Loader />
                <h4 className="text-center">โปรดรอสักครู่ กำลังดำเนินการ..</h4>
                <p className="text-center">
                  โปรดอย่าปิดหน้าต่างนี้จนกว่าจะดำเนินการเสร็จสิ้น
                </p>
              </div>
              <div className="flow-run">
                <p>Check Login..</p>
                <Button
                  variant="danger"
                  className="me-2"
                  onClick={() => setRedeemStep("stepLogin")}
                >
                  ไม่ได้ล็อคอิน
                </Button>
                <Button
                  variant="success"
                  onClick={() => setRedeemStep("stepCheckaccount")}
                >
                  ล็อคอินไว้อยู่แล้ว
                </Button>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
        {redeemStep == "stepLogin" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header">
                    <i className="login-icon me-2"></i>เข้าสู่ระบบ
                  </h4>
                  <p className="subheader">โปรดเลือกช่องทางในการเข้าสู่ระบบ</p>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={props.onClose}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <div className="login-choice">
                  <Button
                    variant="login-card"
                    onClick={() => setRedeemStep("stepJoinlogin")}
                  >
                    <img
                      className="login-card-img"
                      src="/assets/image/icon/JoinLogo.png"
                    />
                    <p>
                      เข้าสู่ระบบด้วย
                      <br />
                      Join
                    </p>
                  </Button>
                  <Button
                    variant="login-card"
                    onClick={() => setRedeemStep("stepCheckaccount")}
                  >
                    <img
                      className="login-card-img"
                      src="/assets/image/icon/MetamaskLogo.svg"
                    />
                    <p>
                      เข้าสู่ระบบด้วย
                      <br />
                      Metamask
                    </p>
                  </Button>
                </div>
                <p className="text-center mt-4">
                  หากยังไม่มีบัญชี กรุณา{" "}
                  <a className="text-primary" onClick={props.onClose}>
                    สมัครสมาชิก
                  </a>{" "}
                  ใหม่
                </p>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
        {redeemStep == "stepCheckaccount" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">กำลังตรวจสอบข้อมูลบัญชี</h4>
                </div>
                <div className="col-right">
                  {/* <Button variant="close-modal" onClick={props.onClose}></Button> */}
                </div>
              </div>
              <div className="tps-modal-body">
                <Loader />
                <h4 className="text-center">โปรดรอสักครู่ กำลังดำเนินการ..</h4>
                <p className="text-center">
                  โปรดอย่าปิดหน้าต่างนี้จนกว่าจะดำเนินการเสร็จสิ้น
                </p>
              </div>
              <div className="flow-run">
                <p>Check Account Info..</p>
                <Button
                  variant="danger"
                  className="me-2"
                  onClick={() => setRedeemStep("stepInput")}
                >
                  ข้อมูลไม่ครบ
                </Button>
                <Button
                  variant="success"
                  onClick={() => setRedeemStep("stepRedeem")}
                >
                  ข้อมูลครบแล้ว
                </Button>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
        {redeemStep == "stepJoinlogin" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header">เข้าสู่ระบบด้วย JOIN</h4>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={props.onClose}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <Form className="w-100">
                  <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label>
                      อีเมลหรือเบอร์มือถือ
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control type="email" placeholder="example@mail.com" />
                    {/* <Form.Text className="text-muted">We'll never share your email with anyone else.</Form.Text> */}
                  </Form.Group>

                  <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>
                      รหัสผ่าน<span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control
                      type="password"
                      placeholder="ต้องมี 8 ตัวอักษรขึ้นไป"
                    />
                  </Form.Group>
                  <div className="row">
                    <div className="col me-auto">
                      <Form.Group
                        className="mb-3"
                        controlId="formBasicCheckbox"
                      >
                        <Form.Check type="checkbox" label="จดจำฉันไว้" />
                      </Form.Group>
                    </div>
                    <div className="col-auto ms-auto">
                      <a className="text-primary">ลืมรหัสผ่าน</a>
                    </div>
                  </div>
                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100"
                    onClick={() => setRedeemStep("stepCheckaccount")}
                  >
                    เข้าสู่ระบบ
                  </Button>
                </Form>
                <p className="text-center mt-4">
                  หากยังไม่มีบัญชี กรุณา{" "}
                  <a className="text-primary" onClick={props.onClose}>
                    สมัครสมาชิก
                  </a>{" "}
                  ใหม่
                </p>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
        {redeemStep == "stepInput" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-left">
                  <h4 className="header">กรุณากรอกข้อมูลเพิ่มเติม</h4>
                  <p className="subheader">
                    ข้อมูลนี้จะใช้ในการระบุการเป็นเจ้าของคริปโทแสตมป์ที่คุณจะได้รับ
                  </p>
                </div>
                <div className="col-right">
                  <Button
                    variant="close-modal"
                    onClick={props.onClose}
                  ></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <Form className="w-100">
                  <Form.Group className="mb-3" controlId="firstname">
                    <Form.Label>
                      ชื่อ<span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="โปรดกรอกชื่อจริง" />
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="lastname">
                    <Form.Label>
                      นามสกุล<span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="โปรดกรอกนามสกุล" />
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="lastname">
                    <Form.Label>
                      อีเมล<span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control type="email" placeholder="example@mail.com" />
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="idnumber">
                    <Form.Label>
                      หมายเลขบัตรประชาชน / พาสปอร์ต
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="x-xxxx-xxxxx-xx-x" />
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="idnumber">
                    <Form.Label>
                      วัน/เดือน/ปี ค.ศ. เกิด
                      <span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <DatePicker
                      dateFormat="dd/MM/yyyy"
                      selected={startDate}
                      onChange={(date) => setStartDate(date)}
                      className="form-control"
                      placeholderText="dd/mm/yyyy"
                    />
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="mobileno">
                    <Form.Label>
                      เบอร์มือถือ<span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <InputGroup className="mb-3">
                      <Form.Control
                        placeholder="xxx-xxx-xxxx"
                        aria-label="mobile number"
                        aria-describedby="mobile-number"
                      />
                      <Button variant="primary" id="button-otp">
                        ขอ OTP
                      </Button>
                    </InputGroup>
                  </Form.Group>
                  <Form.Group className="mb-3" controlId="otpno">
                    <Form.Label>
                      รหัส OTP<span className="text-primary ms-1">*</span>
                    </Form.Label>
                    <Form.Control type="password" placeholder="xxxx" />
                    <Form.Text className="text-muted">
                      กรอกรหัส Otp ที่ได้รับจากข้อความบนมือถือ
                    </Form.Text>
                  </Form.Group>

                  <Button
                    variant="primary"
                    size="lg"
                    className="w-100 mb-3"
                    onClick={() => setRedeemStep("stepCheckaccount")}
                  >
                    ยืนยันข้อมูล
                  </Button>
                  <Button
                    variant="secondary"
                    size="lg"
                    className="w-100"
                    onClick={props.onClose}
                  >
                    ยกเลิก
                  </Button>
                </Form>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
        {redeemStep == "stepRedeem" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">กำลัง Redeem NFT Stamp</h4>
                </div>
                <div className="col-right">
                  {/* ไม่ให้ปิดหน้า modal นี้ */}
                  {/* <Button variant="close-modal" onClick={props.onClose}></Button> */}
                </div>
              </div>
              <div className="tps-modal-body">
                <Loader />
                <h4 className="text-center">โปรดรอสักครู่ กำลังดำเนินการ..</h4>
                <p className="text-center">
                  โปรดอย่าปิดหน้าต่างนี้จนกว่าจะดำเนินการเสร็จสิ้น
                </p>
              </div>
              <div className="flow-run">
                <p>Redeem NFT..</p>
                <Button
                  variant="danger"
                  className="me-2"
                  onClick={() => setRedeemStep("stepRedeemerror")}
                >
                  เกิดข้อผิดพลาด
                </Button>
                <Button
                  variant="success"
                  onClick={() => setRedeemStep("stepGetreward")}
                >
                  สำเร็จ
                </Button>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
        {redeemStep == "stepGetreward" ? (
          <>
            <div className="tps-modal get-reward">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header text-white">คุณได้รับแสตมป์ใหม่</h4>
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
                  className="reward-card mb-4"
                  src="/assets/image/nft-stamp/stamp-01.jpg"
                />
                <h4 className="text-center">1st NFT STAMP IN ASEAN x 1 ดวง</h4>
                <p className="text-center">
                  ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์
                  <br />
                  ที่ปฏิบัติภารกิจรับใช้เคียงคู่คนไทยมาอย่างยาวนาน
                </p>
                <Button variant="primary" size="lg" className="w-100 mb-3">
                  ไปยัง Inventory
                </Button>
                <Button
                  variant="secondary"
                  size="lg"
                  className="w-100"
                  onClick={props.onClose}
                >
                  ปิดหน้านี้
                </Button>
              </div>
            </div>
          </>
        ) : (
          <></>
        )}
        {redeemStep == "stepRedeemerror" ? (
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
                <h4 className="text-center">ไม่สามารถ Redeem Code นี้ได้</h4>
                <p className="text-center mb-4">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                </p>
                <Button
                  variant="secondary"
                  size="lg"
                  className="w-100"
                  onClick={props.onClose}
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
