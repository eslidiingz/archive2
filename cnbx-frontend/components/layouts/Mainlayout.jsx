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
import TopbarMenu from "./TopbarMenu";
import { useEffect } from "react";
import { useCallback } from "react";

function Mainlayout({ children }) {
  const [toggleViewMode, setToggleViewMode] = useState(false);

  const fetchUserAccept = async () => {
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

      const data = await response.json();
      console.log(data);
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
  }, []);

  return (
    <>
      <div className="main-layout">
        <Topbar />
        {children}
      </div>
      <Footer />
    </>
  );
}

export default Mainlayout;
