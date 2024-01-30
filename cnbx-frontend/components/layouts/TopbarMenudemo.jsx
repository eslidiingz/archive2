import Link from "next/link";
import { useEffect, useRef, useState } from "react";
import { useRouter } from "next/router";
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
import LoginModal from "../modal/LoginModal";

function TopbarMenudemo() {
  const MENUS = [
    { id: "homepage", name: "รู้จักแสตมป์", pathname: "#Information",target: "" },
    {
      id: "BuyStammp",
      name: "สั่งซื้อแสตมป์",
      pathname:
        "https://www.thailandpostmart.com/product/1013460000816/%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%82%E0%B8%97%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-02-25651-00-%E0%B9%80%E0%B8%A3%E0%B8%B4%E0%B9%88%E0%B8%A1%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%AA%E0%B9%88%E0%B8%87-14-%E0%B8%AA%E0%B8%8465-%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99%E0%B9%84%E0%B8%9B/",
      target: "_blank"
    },
    { id: "CodeStamp", name: "กรอกรหัสรับ NFT", pathname: "#CodeStamp",target: "" },
    { id: "FAQ", name: "FAQ", pathname: "#FAQ",target: "" },
    { id: "Register", name: "สมัครสมาชิก", pathname: "",target: "" },
    // { id: "Login", name: "เข้าสู่ระบบ", pathname: "#" },
  ];
  const router = useRouter();
  const [showLoginModal, setShowLoginModal] = useState(false);
  const handleOpenLoginModal = () => {
    setShowLoginModal(true);
  };
  const handleCloseLoginModal = () => {
    setShowLoginModal(false);
  };
  return (
    <>
      <div className="layout_menu bg-menu d-lg-block d-none c-home-tab-bar">
        <div className="container h-100">
          <div className="row h-100">
            <div className="col-lg-2 d-lg-flex d-none align-items-center justify-content-start">
              <img alt="Logo" src="/assets/image/icon/hamburger_menu.svg" />
              <p className="text-menuL">เมนูลัด</p>
            </div>
            <div className="col-lg-10 col-12 d-flex justify-content-lg-end justify-content-center align-items-center">
              {MENUS.map(({ id, name, pathname, target }) => (
                <Link href={pathname} key={id}>
                  <a target={target}>
                    <div
                      className={`layout_text-menu ${router.pathname === pathname ? "active" : ""
                        }`}
                    >
                      <p className="text-menuR">{name}</p>
                    </div>
                  </a>
                </Link>
              ))}
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
export default TopbarMenudemo;
