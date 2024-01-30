import { useEffect, useRef, useState, useCallback } from "react";

import { useRouter } from "next/router";

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

import Offcanvas from "react-bootstrap/Offcanvas";

import LoginModal from "../modal/LoginModal";
import RegisterModal from "../modal/RegisterModal";

function Topbardemo() {
  const router = useRouter();

  const [scroll, setScroll] = useState(false);

  const checkScroll = () => {
    if (window.scrollY > 300) {
      setScroll(true);
    } else {
      setScroll(false);
    }
  };

  useEffect(() => {
    window.addEventListener("scroll", checkScroll);
    return () => {
      window.removeEventListener("scroll", checkScroll);
    };
  }, []);

  const [showHamburger, setShowHamburger] = useState(false);

  const [showModalRegister, setShowModalRegister] = useState(false);

  const [showModalLogin, setShowModalLogin] = useState(false);

  const [registerUser, setRegisterUser] = useState(null);

  const handleOpenLoginModal = () => {
    setShowModalLogin(true);
  };

  const handleCloseLoginModal = () => {
    setShowModalLogin(false);
  };

  const fetchUserAccept = async () => {
    console.log("%c === fetchUserAccept ", "color: yellow");

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
      console.log(" === resUserInfo ", resUserInfo);

      setRegisterUser(resUserInfo?.data?.response?.data?.profile);
    } catch (error) {
      console.log(error);
    }
  };

  const handleLogout = () => {
    setRegisterUser(null);
    sessionStorage.removeItem("authentication");
    router.reload();
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

      <RegisterModal
        show={showModalRegister}
        onHide={() => setShowModalRegister(false)}
      />

      <Navbar
        className={
          scroll
            ? "navbar-section bg-navfade d-lg-block d-none my-3"
            : "navbar-section d-lg-block d-none my-3"
        }
        expand="lg"
        variant="dark"
      >
        <Container>
          <Navbar.Brand>
            <Link href="/demo">
              <div className="logo-navbar d-lg-block d-none"></div>
            </Link>
          </Navbar.Brand>
          <Navbar.Toggle aria-controls="navbarMenu" />
          <Navbar.Collapse id="navbarMenu">
            <Nav className="topbar-right d-lg-flex d-none" navbarScroll>
              {registerUser === null ? (
                <>
                  <Button variant="primary">สมัครใช้งาน</Button>
                  {/* LOGIN BUTTON DESKTOP */}
                  <Button
                    variant="outline-primary"
                    className="ms-lg-3 mt-2 mt-lg-0 d-lg-flex d-none justify-content-center"
                    // onClick={() => setShowModalLogin(true)}
                  >
                    เข้าสู่ระบบ
                  </Button>
                  <img
                    className="img_icon-menu me-3 cursor-pointer d-lg-none d-flex"
                    src="/assets/image/icon/user 2.svg"
                    // onClick={() => setShowModalLogin(true)}
                  />
                  {/* LOGIN BUTTON DESKTOP END */}
                </>
              ) : (
                <>
                  <Link href={"/account"}>
                    <Button
                      variant="outline-primary"
                      className="ms-lg-3 mt-2 mt-lg-0"
                    >
                      บัญชีของฉัน
                    </Button>
                  </Link>
                  <Button
                    variant="outline-primary"
                    className="ms-lg-3 mt-2 mt-lg-0"
                    onClick={handleLogout}
                  >
                    ออกจากระบบ
                  </Button>
                </>
              )}
            </Nav>
          </Navbar.Collapse>
        </Container>
      </Navbar>

      <div className="d-lg-none d-flex navbar-mobile">
        <div className="container">
          <div className="row">
            <div className="col-auto justify-content-start align-items-center">
              <img
                className="img_icon-menu cursor-pointer"
                src="/assets/image/hamburger_B.svg"
                onClick={() => setShowHamburger(true)}
              />
              <Offcanvas
                show={showHamburger}
                onHide={() => setShowHamburger(false)}
              >
                <Offcanvas.Header closeButton>
                  {/* <Offcanvas.Title>Offcanvas</Offcanvas.Title> */}
                </Offcanvas.Header>
                <Offcanvas.Body>
                  <div className="row">
                    <div className="col-12">
                      <Link href={"#Information"}>
                        <p className="text-menuR">รู้จักแสตมป์</p>
                      </Link>
                      <hr />
                      <Link
                        href={
                          "https://www.thailandpostmart.com/product/1013460000816/%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%82%E0%B8%97%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-02-25651-00-%E0%B9%80%E0%B8%A3%E0%B8%B4%E0%B9%88%E0%B8%A1%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%AA%E0%B9%88%E0%B8%87-14-%E0%B8%AA%E0%B8%8465-%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99%E0%B9%84%E0%B8%9B/"
                        }
                      >
                        <a target="_blank">
                          <p className="text-menuR">สั่งซื้อ Stamp</p>
                        </a>
                      </Link>
                      <hr />
                      <Link href={"#CodeStamp"}>
                        <p className="text-menuR">กรอกรหัสรับ NFT</p>
                      </Link>
                      <hr />
                      <Link href={"#FAQ"}>
                        <p className="text-menuR">FAQ</p>
                      </Link>
                      <hr />
                    </div>
                  </div>
                </Offcanvas.Body>
              </Offcanvas>
            </div>
            <div className="col w-100 me-auto d-flex justify-content-center">
              <Link href={"/demo"}>
                <img
                  alt="Logo"
                  src="/assets/image/logo.svg"
                  className="logo_mobile cursor-pointer"
                />
              </Link>
            </div>
            <div className="col-auto ms-auto mr-0 d-flex">
              {/* <Link href={""}>
								<img
									className="img_icon-menu me-3 cursor-pointer"
									src="/assets/image/icon/user 2.svg"
								/>
							</Link> */}

              {/* LOGIN BUTTON DESKTOP */}
              <Button
                variant="outline-primary"
                className="ms-lg-3 mt-2 mt-lg-0 d-lg-flex d-none justify-content-center"
                onClick={() => setShowModalLogin(true)}
              >
                เข้าสู่ระบบ
              </Button>
              <img
                className="img_icon-menu me-3 cursor-pointer d-lg-none d-flex"
                src="/assets/image/icon/user 2.svg"
                onClick={() => setShowModalLogin(true)}
              />
              {/* LOGIN BUTTON DESKTOP END */}

              <Link href={"/register"}>
                <img
                  className="img_icon-menu cursor-pointer"
                  src="/assets/image/icon/reg.svg"
                />
              </Link>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
export default Topbardemo;