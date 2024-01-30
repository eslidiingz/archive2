import {
    Form,
    Button,
    InputGroup,
    Modal,
} from "react-bootstrap";
import { useEffect, useRef, useState } from "react";
import "react-datepicker/dist/react-datepicker.css";
import Loader from "../../layouts/Loader";

function Redeemdemo() {

const [show, setShow] = useState(false);
    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);
    const [redeemStep, setRedeemStep] = useState("stepStandby");

    const onClosemodal = () => {
        setShow(false);
        setRedeemStep("stepStandby");
    };
    const onStartModal = () => {
        setShow(true);
        setRedeemStep("stepLoading");
        setTimeout(() => {
            setRedeemStep("stepGetreward");
        }, 2000);
    };

    const [showRedeemModal, setShowRedeemModal] = useState(false);

    const handleOpenRedeemModal = () => {
        setShowRedeemModal(true);
    };

    const handleCloseRedeemModal = () => {
        setShowRedeemModal(false);
    };


    return (
        <>
        <div id="CodeStamp" className="idpoint"></div>
            <section className="layout_codestamp">
                <div className="container">
                    <div className="row">
                        <div className="col-12" align="center">
                            <p className="text-tittle_codestamp">กรอกรหัสแสตมป์</p>
                            <InputGroup className="layout-input_progress">
                                <Form.Control
                                    placeholder="กรอกรหัสคริปโทแสตมป์"
                                    className="input_progress"
                                />
                                <Button variant="dark" onClick={onStartModal}>
                                    Redeem
                                </Button>
                            </InputGroup>
                            <p className="text-detail_codestamp mb-2">
                                โปรดเข้าสู่ระบบก่อนทำการ Redeem
                                <a className="text-detail_blue mx-2">คลิกที่นี่</a>
                                เพื่อสมัครสมาชิกใหม่
                            </p>
                            <p className="text-4">
                                1 user สามารถลงทะเบียนรับ <br className="d-block d-sm-none"/>NFT Stamp ได้มากกว่า 1 ชิ้น
                            </p>
                            <p className="text-4">ลงทะเบียนได้ถึง 14 สิงหาคม 2566 เท่านั้น</p>
                        </div>
                    </div>
                </div>
                
                    {redeemStep == "stepLoading" ? (
                    <>
                        <Modal
                        show={show}
                        backdrop="static"
                        keyboard={false}
                        aria-labelledby="contained-modal-title-vcenter"
                        centered
                        >
                        <div className="tps-modal">
                        <div className="tps-modal-header">
                            <div className="col-center">
                            <h4 className="header">กำลัง Redeem คริปโทแสตมป์</h4>
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
                        </div>
                    </Modal>
                    </>
                    ) : (
                    <></>
                    )}
                    {redeemStep == "stepGetreward" ? (
                    <>
                    <Modal
                        show={show}
                        backdrop="static"
                        keyboard={false}
                        aria-labelledby="contained-modal-title-vcenter"
                        centered
                        >
                        <div className="tps-modal get-reward">
                        <div className="tps-modal-header">
                            <div className="col-center">
                            <h4 className="header text-white">คุณได้รับแสตมป์ NFT ใหม่</h4>
                            </div>
                            <div className="col-right">
                            <Button
                                variant="close-modal"
                                onClick={onClosemodal}
                            ></Button>
                            </div>
                        </div>
                        <div className="tps-modal-body">
                            <img
                            className="reward-card mb-4"
                            src="/assets/image/stamp/forgive.png"
                            />
                            <h4 className="text-center">1st NFT STAMP IN ASEAN x 1 ดวง</h4>
                            <p className="text-center mb-4">
                            ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์
                            </p>
                            <Button variant="primary" size="lg" className="w-100 mb-3" onClick={onClosemodal}>
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
                        </Modal>
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
                                onClick={onClosemodal}
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
                            onClick={onClosemodal}
                            >
                            ปิดหน้านี้
                            </Button>
                        </div>
                        </div>
                    </>
                    ) : (
                    <></>
                    )}
            </section>
        </>
    );
}
export default Redeemdemo;
