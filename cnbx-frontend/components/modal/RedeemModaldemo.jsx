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
  const [redeemStep, setRedeemStep] = useState("stepRedeem");

  const onClosemodal = () => {
    setShow(false);
    setRedeemStep("stepRedeem");
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


        {redeemStep == "stepRedeem" ? (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">กำลัง Redeem NFT Stamp</h4>
                </div>
                <div className="col-right">
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
                <Button variant="primary" size="lg" className="w-100 mb-3" onClick={props.onClose}>
                  {/* ไปยัง Inventory */}
                  ปิดหน้านี้
                </Button>
                {/* <Button
                  variant="secondary"
                  size="lg"
                  className="w-100"
                  onClick={props.onClose}
                >
                  ปิดหน้านี้
                </Button> */}
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
