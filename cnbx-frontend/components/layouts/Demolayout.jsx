import Link from "next/link";
import Footerdemo from "./Footerdemo";
import { useState } from "react";
import {
  Navbar,
  Container,
  Form,
  FormControl,
  Nav,
  NavDropdown,
} from "react-bootstrap";

import Topbardemo from "./Topbardemo";
import TopbarMenu from "./TopbarMenu";
import { useEffect } from "react";
import { useCallback } from "react";

function Demolayout({ children }) {

  return (
    <>
      <div className="main-layout">
        <Topbardemo />
        {children}
      </div>
      <Footerdemo />
    </>
  );
}

export default Demolayout;
