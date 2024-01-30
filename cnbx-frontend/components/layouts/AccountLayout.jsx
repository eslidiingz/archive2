import Link from "next/link";
import Footer from "./Footer";
import { useState } from "react";
import {
  Navbar,
  Container,
  Form,
  FormControl,
  Nav,
  NavDropdown,
} from "react-bootstrap";

import Topbar from "./Topbar";
import Sidebar from "./Sidebar";

function AccountLayout({ children }) {
  const [toggleViewMode, setToggleViewMode] = useState(false);
  return (
    <>
      <div className="account-layout">
        <Topbar />
        <div className="topbar-seperate"></div>
        <div className="account-container container">
          <div className="sidebar">
            <Sidebar />
          </div>
          <div className="account-content">{children}</div>
        </div>
      </div>
      <Footer />
    </>
  );
}

export default AccountLayout;
