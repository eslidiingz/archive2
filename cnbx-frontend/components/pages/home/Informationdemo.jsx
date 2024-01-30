import Link from "next/link";
import React, { useState, useRef, useEffect } from "react";
import Slider from "react-slick";
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
} from "react-bootstrap";

function Informationdemo() {
  return (
    <section className="hilight-section">
      <div id="Information" className="idpoint"></div>
      <div className="container">
        <div className="row">
          <div className="col-12 text-center mt-4">
            <h2 className="text-primary">
              ทำความรู้จัก แสตมป์ NFT ดวงแรกของ ASEAN
            </h2>
            <h5 className="text-secondary">ไปรษณีย์ไทยเปิดมิติใหม่ของการสะสมแสตมป์บนโลกดิจิทัล<br/>ครั้งแรกของอาเซียน เปิดโลกคู่ขนานวงการสะสม ให้คุณได้ครอบครองแบบ ซื้อ 1 ได้ถึง 2<br/>ภายใต้คอนเซ็ปต์ “ไปรษณีย์ไทยก้าวสู่ดิจิทัล”</h5>
          </div>
          <div className="col-sm-6 col-12 text-center">
            <div className="layout-detail_img d-flex justify-content-center align-items-center">
              <img
                className="img-gtk_hillight"
                src="/assets/image/hilight/GTK01.webp"
              />
            </div>
            <p className="text-detail_hillight">
              <span className="text-primary">ต่อที่ 1 </span>
              ได้รับแสตมป์พร้อมแพ็กเกจส่งตรงถึงบ้าน
            </p>
          </div>
          <div className="col-sm-6 col-12 mt-sm-0 mt-4 text-center">
            <div className="layout-detail_img d-flex justify-content-center align-items-center">
              <img
                className="img-gtk_hillight"
                src="/assets/image/hilight/GTK02.webp"
              />
            </div>
            <p className="text-detail_hillight">
              <span className="text-primary">ต่อที่ 2 </span>
              เปิดมิติใหม่ของการสะสมแสตมป์บนโลกดิจิทัลโดย<br/>
              นำรหัสหลังแถบขูดบนแสตมป์ไปลงทะเบียน<br/>
              สุ่มรับ NFT Stamp จำนวน 1 ชิ้น ฟรี!
              <Link href={"/register"}>
                <a className="text-primary m-1">คลิกที่นี่</a>
              </Link>
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
export default Informationdemo;
