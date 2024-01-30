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
import Loader from "../../layouts/Loader";
import { hexlify, hexZeroPad } from "ethers/lib/utils";
import { useCallback } from "react";
import LoginModal from "../../modal/LoginModal";
import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";
function Redeem() {
  const router = useRouter();
  const { t } = useTranslation("common");
  const [show, setShow] = useState(false);
  const handleClose = () => setShow(false);
  const handleShow = () => setShow(true);
  const [redeemStep, setRedeemStep] = useState("stepChecklogin");
  const [redeemCode, setRedeemCode] = useState("");
  const [tokenRedeem, setTokenRedeem] = useState();
  const [walletAddress, setWalletAddress] = useState();
  const [showModalLogin, setShowModalLogin] = useState(false);

  const onClosemodal = () => {
    setShow(false);
    setRedeemStep("stepChecklogin");
  };

  const [startDate, setStartDate] = useState(new Date());

  const redeemStamp = async () => {
    setShow(!show);
    setRedeemStep("stepRedeem");
    try {
      if (sessionStorage.getItem("authentication") === null) {
        return;
      }
      const { access_token } = JSON.parse(
        sessionStorage.getItem("authentication")
      );

      const response = await fetch("/api/redeem_code", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ access_token, redeem_code: redeemCode }),
      });

      const res = await response.json();

      // console.log("response ", response)
      // console.log("res ", res)

      //   201 คือ ใช้ได้
      //   400 คือ โค๊ดถูกแต่ใช้ไปแล้ว
      //   404 คือ โค๊ดผิด

      if (response.status === 201) {
        setShow(!show);
        setRedeemStep("stepGetreward");

        const tokenHex = hexZeroPad(
          hexlify(parseInt(res?.data?.response?.data)),
          32
        ).substring(2);
        // console.log(" === tokenHex ", tokenHex)

        // console.log(" === url ", `${process.env.NEXT_PUBLIC_METADATA_URL}/${tokenHex}.json`)
        const responseTokens = await fetch(
          `${process.env.NEXT_PUBLIC_METADATA_URL}/${tokenHex}.json`
        );
        // console.log(" === responseTokens ", responseTokens)

        const tokens = await responseTokens.json();
        setTokenRedeem(tokens);
      } else if (response.status === 400) {
        setShow(!show);
        setRedeemStep("stepRedeemerror-400");
      } else if (response.status === 404) {
        setShow(!show);
        setRedeemStep("stepRedeemerror-404");
      }
    } catch (error) {
      console.log(error);
      setRedeemStep("stepRedeemerror");
    }
  };

  const fetchUserAccept = async () => {
    // console.log("%c === fetchUserAccept ", "color: yellow");

    try {
      if (sessionStorage.getItem("authentication") === null) {
        return;
      }
      const { access_token } = JSON.parse(
        sessionStorage.getItem("authentication")
      );

      const response = await fetch("/api/user_info", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ access_token }),
      });

      const resUserInfo = await response.json();
      // console.log(" === resUserInfo ", resUserInfo);

      setWalletAddress(resUserInfo?.data?.response?.data?.profile);
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    let mounted = true;
    if (mounted) fetchUserAccept();
    return () => {
      mounted = false;
    };
    // fetchUserAccept();
  }, []);

  return (
    <>
      <LoginModal
        show={showModalLogin}
        onHide={() => setShowModalLogin(false)}
        fetchUserAccept={() => fetchUserAccept()}
      />
      <section className="layout_codestamp">
      <div id="CodeStamp" className="idpoint"></div>
        <div className="container">
          <div className="row">
            <div className="col-12" align="center">
              <p className="text-tittle_codestamp">{t("Redeem.title1")}</p>
              <InputGroup className="layout-input_progress">
                <Form.Control
                  placeholder={t("Redeem.title5")}
                  className="input_progress"
                  onChange={(e) => setRedeemCode(e.target.value)}
                />
                {walletAddress ? (
                  <Button variant="dark" onClick={() => redeemStamp()}>
                    Redeem
                  </Button>
                ) : (
                  <Button
                    variant="dark"
                    onClick={() => setShowModalLogin(true)}
                  >
                      {t("menu.Login")}
                  </Button>
                )}
              </InputGroup>
              <p className="text-detail_codestamp mb-2">
              {t("Redeem.title2")}
                <Link href="/register">
                  <a className="text-detail_blue mx-2"> {t("GettoNFT.title4Clickhere")}</a>
                </Link>
                {t("Redeem.title3")}
              </p>
              <p className="text-4">
              {t("Redeem.title7")}<br className="d-block d-sm-none"/>{t("Redeem.title8")}
              </p>
              <p className="text-4">{t("Redeem.title4")}</p>
            </div>
          </div>
        </div>
      </section>
      <Modal
        show={show}
        onHide={handleClose}
        backdrop="static"
        keyboard={false}
        aria-labelledby="contained-modal-title-vcenter"
        centered
      >
        {redeemStep == "stepRedeem" && (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">กำลัง Redeem คริปโทแสตมป์</h4>
                </div>
                <div className="col-right">
                  {/* ไม่ให้ปิดหน้า modal นี้ */}
                  {/* <Button variant="close-modal" onClick={onClosemodal}></Button> */}
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
          </>
        )}
        {redeemStep == "stepGetreward" && (
          <>
            <div className="tps-modal get-reward">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header text-white">
                    คุณได้รับแสตมป์ NFT ใหม่
                  </h4>
                </div>
                <div className="col-right">
                  <Button variant="close-modal" onClick={onClosemodal}></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <img className="reward-card mb-4" src={tokenRedeem?.image} />
                <h4 className="text-center">1st NFT STAMP IN ASEAN x 1 ดวง</h4>
                <p className="text-center mb-4">
                  ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์
                </p>
                <Link href={"/account/inventory"}>
                  <Button variant="primary" size="lg" className="w-100 mb-3">
                    ไปยังแสตมป์ NFT ของฉัน
                  </Button>
                </Link>

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
        )}
        {redeemStep == "stepRedeemerror-400" && (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">เกิดข้อผิดพลาด</h4>
                </div>
                <div className="col-right">
                  <Button variant="close-modal" onClick={onClosemodal}></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <img
                  className="modal-msg-img mb-4"
                  src="/assets/image/icon/message.svg"
                />
                <h4 className="text-center mb-4 text-primary">
                  รหัส Redeem นี้ถูกใช้งานแล้ว
                </h4>
                {/* <p className="text-center mb-4">
									กรุณาดำเนินการใหม่ภายหลัง หรือติดต่อเจ้าหน้าที่
								</p> */}
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
        )}
        {redeemStep == "stepRedeemerror-404" && (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">เกิดข้อผิดพลาด</h4>
                </div>
                <div className="col-right">
                  <Button variant="close-modal" onClick={onClosemodal}></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <img
                  className="modal-msg-img mb-4"
                  src="/assets/image/icon/message.svg"
                />
                <h4 className="text-center mb-4 text-primary">
                  รหัส Redeem ไม่ถูกต้อง
                </h4>
                {/* <p className="text-center mb-4">
									กรุณาดำเนินการใหม่ภายหลัง หรือติดต่อเจ้าหน้าที่
								</p> */}
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
        )}
        {redeemStep == "stepRedeemerror" && (
          <>
            <div className="tps-modal">
              <div className="tps-modal-header">
                <div className="col-center">
                  <h4 className="header">เกิดข้อผิดพลาด</h4>
                </div>
                <div className="col-right">
                  <Button variant="close-modal" onClick={onClosemodal}></Button>
                </div>
              </div>
              <div className="tps-modal-body">
                <img
                  className="modal-msg-img mb-4"
                  src="/assets/image/icon/message.svg"
                />
                <h4 className="text-center mb-4 text-primary">
                  มีบางอย่างผิดพลาด
                </h4>
                <p className="text-center mb-4">
                  กรุณาดำเนินการใหม่ภายหลังหรือติดต่อเจ้าหน้าที่
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
        )}
      </Modal>
    </>
  );
}
export default Redeem;
