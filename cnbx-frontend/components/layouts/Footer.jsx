import Link from "next/link"
import { useEffect, useRef, useState } from "react";
import LoginModal from "../modal/LoginModal";
import { useTranslation, Trans } from "next-i18next";
import Router from "next/router";
import { useRouter } from "next/router";


function Footer() {
  const router = useRouter();
  const { t } = useTranslation("common");

  const contantFooter = [
    {
      id: "1",
      tittle: "Line : @stampinlove",
      tittle1:"",
      href1:"",
      href: "https://line.me/ti/p/@stampinlove"
    },
    {
      id: "2",
      tittle: "Facebook : Thaistampmuseum",
      tittle1:"",
      href1:"",
      href: "https://www.facebook.com/Thaistampmuseum"
    },
    {
      id: "3",
      tittle: t("FAQ.Questions_title4_detail4_4"),
      tittle1:"",
      href1:"",
      href: "https://goo.gl/maps/9hN1e48JozwCb6cz9"
    },
    // {
    //   id: "4",
    //   tittle: "1545",
    //   tittle1:"022712439",
    //   href1:"tel:+022712439",
    //   href: "tel:+1545"
    // }
  ];

  const contantNFTFooter = [
    {
      idNFT: "5",
      tittleNFT: "Facebook : JNFT",
      hrefNFT: "https://www.facebook.com/JNFTOfficial"
    },
    {
      idNFT: "6",
      tittleNFT: "Telegram : JNFT",
      hrefNFT: "https://t.me/jnftofficial"
    },
    {
      idNFT: "7",
      tittleNFT: "Twitter : @JNFTOFFICIA",
      hrefNFT: "https://twitter.com/JNFTOfficial"
    },
    {
      idNFT: "8",
      tittleNFT: "Discord : JFIN",
      hrefNFT: "https://discord.gg/JFIN"
    }
  ];

  const QuickMenuFooter = [
    {
      idQM: "9",
      tittleQM: t("menu.NFTStamp"),
      hrefQM: "#Information",
      target: ""
    },
    {
      idQM: "10",
      tittleQM: t("menu.OrderStamps"),
      hrefQM: "https://www.thailandpostmart.com/product/1013460000816/%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%82%E0%B8%97%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-02-25651-00-%E0%B9%80%E0%B8%A3%E0%B8%B4%E0%B9%88%E0%B8%A1%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%AA%E0%B9%88%E0%B8%87-14-%E0%B8%AA%E0%B8%8465-%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99%E0%B9%84%E0%B8%9B/",
      target: "_blank"
    },
    {
      idNFT: "11",
      tittleQM: t("menu.Fill"),
      hrefQM: "#CodeStamp",
      target: ""
    },
    {
      idNFT: "12",
      tittleQM: t("menu.FAQ"),
      hrefQM: "#FAQ",
      target: ""
    },
    {
      idNFT: "13",
      tittleQM: t("menu.Registernav"),
      hrefQM: "/register",
      target: ""
    }
  ];
  const [showLoginModal, setShowLoginModal] = useState(false);
  const handleOpenLoginModal = () => {
    setShowLoginModal(true);
  };
  const handleCloseLoginModal = () => {
    setShowLoginModal(false);
  };

  return (
    <section className="footer">
      <div className="layout_footer">
        <div className="container">
          <div className="row d-flex align-items-center px-lg-0 px-4">
            <div className="col-lg-4">
              <Link href={"/"}>
                <img className="img_footer" src="/assets/image/logo.svg" />
              </Link>
              <p className="tittle-logo_footer">{t("footer.title3")}</p>
              <p className="detail-logo_footer mb-3">{t("footer.title4")}</p>
            </div>
            <div className="col-lg-4 mb-4">
              <p className="text-topic_footer mt-3">{t("footer.title1")}</p>
              {contantFooter.map((item, index) => (
                <Link href={item.href} key={item.id}>
                  <a target="_blank">
                    <div className="d-flex align-items-center mb-1">
                      <i className="fas fa-arrow-alt-circle-right icon_footers"></i>
                      <p className="text-detail_footer ">{item.tittle}
                        {/* <a target="_blank" className="text-detail_footer " href={item.href1}><span>{item.tittle1}</span></a> */}
                      </p>
                    </div>
                  </a>
                </Link>
              ))}
              <div className="d-flex align-items-center">
                <Link href={"tel:+1545"}>
                  <a target="_blank" className="d-flex align-items-center">
                    <i className="fas fa-arrow-alt-circle-right icon_footers"></i>
                    <p className="text-detail_footer">Call Center : 1545 ,</p>
                  </a>
                </Link>
                 <Link href={"tel:+022712439"}>
                  <a target="_blank" className="d-flex align-items-center">
                    <p className="text-detail_footer"> หรือโทร : 02-2271-2439</p>
                  </a>
                </Link>
              </div>
            </div>

            <div className="col-lg-4 mb-4">
              <p className="text-topic_footer mt-3">{t("footer.title2")}</p>
              {contantNFTFooter.map((item, index) => (
                <Link href={item.hrefNFT} key={item.idNFT}>
                  <a target="_blank">
                    <div className="d-flex align-items-center mb-1">
                      <i className="fas fa-arrow-alt-circle-right icon_footers"></i>
                      <p className="text-detail_footer ">{item.tittleNFT}</p>
                    </div>
                  </a>
                </Link>
              ))}
            </div>

            <div className="row h-100 mt-lg-3 mt-4">
              <div className="col-xxl-4 d-xxl-block d-none">
              </div>
              <div className="col-xxl-1 col-lg-3 d-flex align-items-center justify-content-start">
                <p className="text-topic_footer mb-0">{t("menu.MenuNav")}</p>
              </div>
              <div className="col-xxl-6 col-lg-9 d-lg-flex d-none justify-content-end align-items-center">
                {QuickMenuFooter.map((item, index) => (
                  <Link href={item.hrefQM} key={item.idQM}>
                    <a target={item.target}>
                      <div className="d-flex align-items-center me-3">
                        <i className="fas fa-arrow-alt-circle-right icon_footers"></i>
                        <p className="text-detail_footer">{item.tittleQM}</p>
                      </div>
                    </a>
                  </Link>
                ))}
              </div>

              <div className="col-12 d-lg-none d-block">
                {QuickMenuFooter.map((item, index) => (
                  <Link href={item.hrefQM} key={item.idQM}>
                    <div className="d-flex align-items-center me-3 mb-1">
                      <i className="fas fa-arrow-alt-circle-right icon_footers"></i>
                      <p className="text-detail_footer">{item.tittleQM}</p>
                    </div>
                  </Link>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>

      <div className="footer-bottom">
        <div className="container">
          <div className="row">
            <div className="col-lg-10 col-12 mb-lg-0 mb-2 d-flex justify-content-center justify-content-lg-start">
              Copyright © 2022 Thailandpost NFT Co., Ltd. All rights reserved.
            </div>
            <div className="col-lg-2 col-12 d-flex justify-content-center">
              <Link href={"https://www.facebook.com/Thaistampmuseum"}>
                <a target="_blank">
                  <i className="fab fa-facebook-f cursor-pointer icon_footer icon-color-gray"></i>
                </a>
              </Link>
              <Link href={"https://line.me/ti/p/@stampinlove"}>
                <a target="_blank">
                  <i className="fab fa-line icon_footer cursor-pointer icon-color-gray"></i>
                </a>
              </Link>
              {/* <Link href={""}>
                <i className="fab fa-youtube icon_footer cursor-pointer"></i>
              </Link> */}
            </div>
          </div>
        </div>
      </div>
    </section>

  )
}
export default Footer
