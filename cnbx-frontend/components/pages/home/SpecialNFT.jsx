import Link from "next/link";
import React, { useState, useRef, useEffect } from "react";
import Slider from "react-slick";
import Tooltip from 'react-bootstrap/Tooltip';
import OverlayTrigger from 'react-bootstrap/OverlayTrigger'

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
import ComuDetail from "./ComuDetail";
import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";


function SpecialNFT() {
  const router = useRouter();
  const { t } = useTranslation("common");
  const [showOverlay, setShowOverlay] = useState(false);
  const [showComu, setShowComu] = useState(false);
  const onShowOverlay = () => {
    setShowOverlay(true);
  };
  const onShowComu = () => {
    setShowComu(true);
  };
  const onCloseOverlay = () => {
    setShowOverlay(false);
    setShowComu(false);
  };

  const renderTooltip = (props) => (
    <Tooltip id="button-tooltip" {...props}>
      <h4>Stamp นกพิราบ</h4>
      <p><span className="ci-color-orange">Common :</span> สีพื้นเรียบ ๆ โทนสีขาว เทา ดำ </p>
      <p><span className="ci-color-orange">Uncommon :</span> สีพื้นเรียบ ๆ  โทนสีสดใส </p>
      <p><span className="ci-color-orange">Rare :</span> ไล่เฉดสีในโทนสดใส </p>
      <p><span className="ci-color-orange">Epic :</span> ไล่เฉดสีในโทนสีเงิน </p>
      <p><span className="ci-color-orange">Legend :</span> นกพิราบมีลวดลายในตัว </p>
    </Tooltip>
  );
  const renderTooltipleft = (props) => (
    <Tooltip id="button-tooltip" {...props}>
      <h4>Background</h4>
      <p><span className="ci-color-orange">Common :</span> สีพื้นเรียบๆ ไม่มีลวดลาย </p>
      <p><span className="ci-color-orange">Uncommon-Rare :</span> ลายคลื่นสลับสี </p>
      <p><span className="ci-color-orange">Epic-Legend :</span> ลายคลื่นพร้อมลวดลาย </p>
    </Tooltip>
  );
  const renderTooltipleftset = (props) => (
    <Tooltip id="button-tooltip" {...props}>
      <h4>Element</h4>
      <p><span className="ci-color-orange">Common :</span> พัสดุชิ้นเล็ก </p>
      <p><span className="ci-color-orange">Uncommon :</span> ตู้ไปรษณีย์ </p>
      <p><span className="ci-color-orange">Rare :</span> ยานพาหนะสองล้อ </p>
      <p><span className="ci-color-orange">Epic :</span> รถตู้ รถบรรทุก รถปิคอัพ </p>
      <p><span className="ci-color-orange">Legend :</span> ขอบแสตมป์ </p>
    </Tooltip>
  );

  const ContentSPNFT = [
    {
      id: "001",
      title: "ครั้งแรกของอาเซียน",
      img: "/assets/image/icon/Spicon01.svg",
      link: "",
      detail:
        "ในการเปิดโลกคู่ขนานวงการสะสมแสตมป์ ที่นอกจากจะได้รับแสตมป์ไปครอบครองแล้ว ยังได้แถม NFT ไปสะสมอีกต่อด้วย นับเป็นการเชื่อมนักสะสมจากโลกคู่ขนานให้มาพบกัน นั่นคือนักสะสม NFT และนักสะสมแสตมป์",
    },
    {
      id: "002",
      title: "ครั้งแรกกับศิลปิน NFT มากถึง 18 คาแรคเตอร์",
      img: "/assets/image/icon/Spicon02.svg",
      link: "",
      detail:
        "ล้วนแล้วแต่เป็นแนวหน้าของวงการ ร่วมกันสร้างสรรค์ผลงานมากถึง 50,000 ชิ้น ไม่ซ้ำแบบด้วย Generative Arts ",
    },
    {
      id: "003",
      title: "NFT Legend ที่มีแค่ 140 ชิ้น ",
      img: "/assets/image/icon/Spicon03.svg",
      link: "",
      detail:
        "ในคอลเลคชั่น 1st NFT Stamp in ASEAN นี้ จะมีระดับ Legend ที่หายากที่สุดอยู่เพียง 140 ชิ้น ให้ตามหาเป็นเจ้าของโดยการสุ่ม ความพิเศษจะอยู่ที่ texture ของนกพิราบที่จะมีความพิเศษเฉพาะตัว รวมถึงมีกรอบฟันแสตมป์ นอกจากนี้ยังมีระดับความหายากจากมากไปน้อย คือ EPIC, RARE, UNCOMMON และ COMMON ตามลำดับ",
    },
  ];
  const sliderSettings = {
    dots: false,
    infinite: false,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          initialSlide: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  };

  const typeLegend = [
    {
      img: "legend/เทรดเดอร์หน้าหมี.webp"
    },
    {
      img: "legend/Zillafrens.webp"
    },
    {
      img: "legend/Stocker Dao.webp"
    },
    {
      img: "legend/Naga Dao.webp"
    },
    {
      img: "legend/PunkKub.webp"
    },
    {
      img: "legend/Moo Monster.webp"
    },
  ];

  const typeEpic = [
    {
      img: "epic/01133.webp"
    },
    {
      img: "epic/00896.webp"
    },
    {
      img: "epic/00562.webp"
    },
    {
      img: "epic/00805.webp"
    },
    {
      img: "epic/00277.webp"
    },
    {
      img: "epic/00483.webp"
    },
  ];

  const typeRare = [
    {
      img: "rare/05551.webp"
    },
    {
      img: "rare/05150.webp"
    },
    {
      img: "rare/03808.webp"
    },
    {
      img: "rare/04160.webp"
    },
    {
      img: "rare/02777.webp"
    },
    {
      img: "rare/03460.webp"
    },
  ];

  const typeUncommon = [
    {
      img: "/uncommon/21249.webp"
    },
    {
      img: "/uncommon/19509.webp"
    },
    {
      img: "/uncommon/20422.webp"
    },
    {
      img: "/uncommon/13659.webp"
    },
    {
      img: "/uncommon/14283.webp"
    },
    {
      img: "/uncommon/18709.webp"
    },
  ];

  const typeCommon = [
    {
      img: "/common/22250.webp"
    },
    {
      img: "/common/23831.webp"
    },
    {
      img: "/common/25523.webp"
    },
    {
      img: "/common/27179.webp"
    },
    {
      img: "/common/28449.webp"
    },
    {
      img: "/common/43330.webp"
    },
  ];

  return (
    <div className="highlight-rolling">
      <div id="Speical" className="idpoint"></div>
      <section className={`highlight-section_speicalNFT ${showOverlay ? "disabled" : ""} ${showComu ? "disabled" : ""}`}>
        <div className="container">
          {/* <div className="container"> */}
          <div className="row layoutdetail_specialNFT" >
            <div className="col-12 pe-lg-5">
              <h2 className="text-primary d-flex justify-content-center justify-content-lg-start mb-5">
              {t("SpecialNFT.title1")}
              </h2>
            </div>
            <div className="col-12">
              <div className="d-flex align-items-center mb-5 flex-column flex-lg-row">
                <img className="icon_speicalNFT" src="/assets/image/icon/Spicon01.svg" />
                <div className="d-block text-center text-lg-start">
                  <p className="tittle_speicalNFT mb-2">{t("SpecialNFT.title2")}</p>
                  <p className="detail_speicalNFT">{t("SpecialNFT.detail2")}</p>
                </div>
              </div>
              <div className="d-flex align-items-center mb-5 flex-column flex-lg-row">
                <img className="icon_speicalNFT" src="/assets/image/icon/Spicon02.svg" />
                <div className="d-block text-center text-lg-start">
                  <p className="tittle_speicalNFT mb-2">{t("SpecialNFT.title3")}</p>
                  <p className="detail_speicalNFT">{t("SpecialNFT.detail3")}</p>
                  <Link href="#Speical" >
                  <a className="text-primary cursor-pointer" onClick={onShowComu}>{t("menu.Read")}<i className="fas fa-chevron-right ms-2"></i></a>
                  </Link>
                </div>
              </div>
              <div className="d-flex align-items-center mb-5 flex-column flex-lg-row">
                <img className="icon_speicalNFT" src="/assets/image/icon/Spicon03.svg" />
                <div className="d-block text-center text-lg-start">
                <p className="tittle_speicalNFT mb-2">{t("SpecialNFT.title4")}</p>
                  <p className="detail_speicalNFT">{t("SpecialNFT.detail4")}</p>
                  <Link href="#Speical" >
                    <a className="text-primary cursor-pointer" onClick={onShowOverlay}>{t("menu.Read")}<i className="fas fa-chevron-right ms-2"></i></a>
                  </Link>
                </div>
              </div>
            </div>
            {/* {ContentSPNFT.map((item, index) => (
              <div key={index} className="col-12 d-lg-block d-none">
                <div className="d-flex align-items-center mb-5">
                  <img className="icon_speicalNFT" src={item.img} />
                  <div className="d-block ">
                    <p className="tittle_speicalNFT mb-2">{item.title}</p>
                    <p className="detail_speicalNFT">{item.detail}</p>
                  </div>
                </div>
              </div>
            ))}
            {ContentSPNFT.map((item, index) => (
              <div key={index} className="d-lg-none d-block mb-5">
                <div className="col-12 mb-2 d-flex justify-content-center">
                  <img className="icon_speicalNFT" src={item.img} />
                </div>
                <div className="d-block ">
                  <p className="tittle_speicalNFT mb-2 text-center">
                    {item.title}
                  </p>
                  <p className="detail_speicalNFT">{item.detail}</p>
                </div>
              </div>
            ))} */}
          </div>
        </div>
        {/* </div> */}
      </section>

      <section className={`section-overlay-right ${showComu ? "" : "d-none"}`}>
        <div className="container">
          <div className="overlay-header mb-5">
            <div className="overlay-header-title">
              <h2 className="text-primary">Community ของแต่ละศิลปิน</h2>
              <h5 className="text-secondary">พบกับผลงานของ 18 ศิลปิน NFT ชั้นนำของไทย</h5>
            </div>

            <Button
              variant="close-modal"
              href="#Speical"
              onClick={onCloseOverlay}
            ></Button>
          </div>

          <ComuDetail />
        </div>
      </section>

      <section className={`section-overlay-right ${showOverlay ? "" : "d-none"}`}>
        <div className="container">
          <div className="overlay-header mb-5">
            <h2 className="overlay-header-title">วิธีสังเกตุความแตกต่าง<br className="d-none d-lg-block" />ของแต่ละระดับความหายาก</h2>
            <Button
              variant="close-modal"
              href="#Speical"
              onClick={onCloseOverlay}
            ></Button>
          </div>
          <div className="row mb-5">
            <div className="col-12 d-flex justify-content-center">
              <img className="intro-rarity d-lg-block d-none" src="/assets/image/specialNFT/rarity-how.svg" />
              <div className=" d-lg-none  d-block">
                <div className=" position-relative ">
                  <img className="intro-rarity " src="/assets/image/specialNFT/rarity-how-sm.png" />
                  <div className="absolute-dot1">
                    <OverlayTrigger
                      placement="top"
                      delay={{ show: 250, hide: 400 }}
                      overlay={renderTooltip}
                      textH4="Element"

                    >
                      <img className="intro-rarity pulsate-bck" src="/assets/image/specialNFT/dot.svg" />
                    </OverlayTrigger>
                  </div>
                  <div className="absolute-dot2">
                    <OverlayTrigger
                      placement="left"
                      delay={{ show: 250, hide: 400 }}
                      overlay={renderTooltipleft}
                      title="Element01"
                    >
                      <img className="intro-rarity pulsate-bck" src="/assets/image/specialNFT/dot.svg" />
                    </OverlayTrigger>
                  </div>
                  <div className="absolute-dot3">
                    <OverlayTrigger
                      placement="left"
                      delay={{ show: 250, hide: 400 }}
                      overlay={renderTooltipleftset}
                      title="Element01"
                    >
                      <img className="intro-rarity pulsate-bck " src="/assets/image/specialNFT/dot.svg" />
                    </OverlayTrigger>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <h3 className="text-primary text-center">ตัวอย่างแสตมป์ NFT ในแต่ละระดับความหายาก</h3>

          <div className="mb-4">
            <div className="d-flex px-2">
              <h4 className="col me-auto text-dark text-bold">ตัวอย่างระดับ LEGEND</h4>
              <p className="col-auto ms-auto text-2">140 ชิ้น</p>
            </div>
            <div className="">
              <Slider {...sliderSettings}>
                {typeLegend.map((item, key) => (
                  <img key={key} className="px-2" src={`/assets/image/specialNFT/sample-stamp/${item.img}`} />
                ))}
              </Slider>
            </div>
          </div>

          <div className="mb-4">
            <div className="d-flex px-2">
              <h4 className="col me-auto text-dark text-bold">ตัวอย่างระดับ EPIC</h4>
              <p className="col-auto ms-auto text-2">1,400 ชิ้น</p>
            </div>
            <div className="">
              <Slider {...sliderSettings}>
                {typeEpic.map((item, key) => (
                  <img key={key} className="px-2" src={`/assets/image/specialNFT/sample-stamp/${item.img}`} />
                ))}
              </Slider>
            </div>
          </div>

          <div className="mb-4">
            <div className="d-flex px-2">
              <h4 className="col me-auto text-dark text-bold">ตัวอย่างระดับ RARE</h4>
              <p className="col-auto ms-auto text-2">6,400 ชิ้น</p>
            </div>
            <div className="">
              <Slider {...sliderSettings}>
                {typeRare.map((item, key) => (
                  <img key={key} className="px-2" src={`/assets/image/specialNFT/sample-stamp/${item.img}`} />
                ))}
              </Slider>
            </div>
          </div>

          <div className="mb-4">
            <div className="d-flex px-2">
              <h4 className="col me-auto text-dark text-bold">ตัวอย่างระดับ UNCOMMON</h4>
              <p className="col-auto ms-auto text-2">14,000 ชิ้น</p>
            </div>
            <div className="">
              <Slider {...sliderSettings}>
                {typeUncommon.map((item, key) => (
                  <img key={key} className="px-2" src={`/assets/image/specialNFT/sample-stamp/${item.img}`} />
                ))}
              </Slider>
            </div>
          </div>

          <div className="mb-4">
            <div className="d-flex px-2">
              <h4 className="col me-auto text-dark text-bold">ตัวอย่างระดับ COMMON</h4>
              <p className="col-auto ms-auto text-2">28,000 ชิ้น</p>
            </div>
            <div className="">
              <Slider {...sliderSettings}>
                {typeCommon.map((item, key) => (
                  <img key={key} className="px-2" src={`/assets/image/specialNFT/sample-stamp/${item.img}`} />
                ))}
              </Slider>
            </div>
          </div>

        </div>
      </section>

    </div>
  );
}
export default SpecialNFT;
