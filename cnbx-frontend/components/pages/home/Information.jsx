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

import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";


function Information() {
  const router = useRouter();
  const { t } = useTranslation("common");

  return (
    <section className="hilight-section" id="Information">
      <div className="container">
        <div className="row">
          <div className="col-12 text-center mt-4">
            <h2 className="text-primary">
              {t("GettoNFT.title1")}
            </h2>
            <h5 className="text-secondary">{t("GettoNFT.title2")}<br/>{t("GettoNFT.title2_1")}<br/>{t("GettoNFT.title2_2")}</h5>
          </div>
          <div className="col-sm-6 col-12 text-center">
            <div className="layout-detail_img d-flex justify-content-center align-items-center">
              <img
                className="img-gtk_hillight"
                src="/assets/image/hilight/GTK01.webp"
              />
            </div>
            <p className="text-detail_hillight">
              <span className="text-primary">{t("GettoNFT.get1")}</span>
              {t("GettoNFT.title3")}
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
              <span className="text-primary">{t("GettoNFT.get2")}</span>
              {t("GettoNFT.title4")}<br/>
              {t("GettoNFT.title4_1")}<br/>
              {t("GettoNFT.title4_2")}
              <Link href={"/register"}>
                <a className="text-primary m-1">{t("GettoNFT.title4Clickhere")}</a>
              </Link>
            </p>
          </div>
        </div>
      </div>
    </section>
  );
}
export default Information;
