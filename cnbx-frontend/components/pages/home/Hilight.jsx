import Link from "next/link"
import React, { useState, useRef, useEffect } from 'react';
import { useRouter } from "next/router";
import Slider from "react-slick";
import { Container, Form, FormControl, Nav, Navbar, NavDropdown, Button, Dropdown, DropdownButton } from "react-bootstrap";
import { useTranslation, Trans } from "next-i18next";


function Hilight() {
  const router = useRouter();
  const { t } = useTranslation("common");

  return (
    <section className="hilight-section_highlight">
      <div className="container">
        <div className="row">
          <div className="col-12 text-center mt-4">
            <img className="img_highlight_main" src="/assets/image/hilight/stamp.webp" />
            <p className="text-tittle-main_highlight">{t("section-hilight.title1")}</p>
            <p className="text-tittle-main_highlightR">{t("section-hilight.title2")}</p>
          </div>
          <div className="col-12 d-flex align-items-center justify-content-center ">
            <Link href={"https://www.thailandpostmart.com/product/1013460000816/%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%82%E0%B8%97%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-02-25651-00-%E0%B9%80%E0%B8%A3%E0%B8%B4%E0%B9%88%E0%B8%A1%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%AA%E0%B9%88%E0%B8%87-14-%E0%B8%AA%E0%B8%8465-%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99%E0%B9%84%E0%B8%9B/"}>
              <a target="_blank">
                <div className="layout-detail_highlight d-sm-flex d-none align-items-center justify-content-center cursor-pointer px-4">
                  <p className="text-detail_highlight">สั่งซื้อได้ที่</p>
                  <img className="img_detail_highlight" src="/assets/image/hilight/Frame.webp" />
                </div>
              </a>
            </Link>
            <div className="layout-detail_highlight d-flex d-sm-none align-items-center justify-content-center cursor-pointerr">
              <Link href={"https://www.thailandpostmart.com/product/1013460000816/%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%82%E0%B8%97%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-02-25651-00-%E0%B9%80%E0%B8%A3%E0%B8%B4%E0%B9%88%E0%B8%A1%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%AA%E0%B9%88%E0%B8%87-14-%E0%B8%AA%E0%B8%8465-%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99%E0%B9%84%E0%B8%9B/"}>
                <a target="_blank">
                  <div className="row">
                    <div className="col-12 text-center">
                      <p className="text-detail_highlight">สั่งซื้อได้ที่</p>
                    </div>
                    <div className="col-12 text-center">
                      <img className="img_detail_highlight" src="/assets/image/hilight/Frame.webp" />
                    </div>
                  </div>
                </a>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </section>

  )
}
export default Hilight
