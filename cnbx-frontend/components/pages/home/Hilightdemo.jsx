import Link from "next/link"
import React, { useState, useRef, useEffect } from 'react';
import Slider from "react-slick";
import { Container, Form, FormControl, Nav, Navbar, NavDropdown, Button, Dropdown, DropdownButton } from "react-bootstrap";

function Hilightdemo() {

  return (
    <section className="hilight-section_highlight">
      <div className="container">
        <div className="row">
          <div className="col-12 text-center mt-4">
            <img className="img_highlight_main" src="/assets/image/hilight/stamp.webp" />
            <p className="text-tittle-main_highlight">ฉลองก้าวสู่ 140 ปี กิจการไปรษณีย์ไทย</p>
            <p className="text-tittle-main_highlightR">แสตมป์ NFT ดวงแรกของ ASEAN</p>
          </div>
          <div className="col-12 d-flex align-items-center justify-content-center">
            <Link href="#CodeStamp">
              <Button variant="primary" size="lg" className="mt-5 mb-4 px-4">
                  กรอกรหัสรับ NFT
              </Button>
            </Link>
          </div>
        </div>
      </div>
    </section>

  )
}
export default Hilightdemo
