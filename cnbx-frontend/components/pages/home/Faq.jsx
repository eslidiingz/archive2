/** @format */

import React, { useState } from "react";
import Accordion from "react-bootstrap/Accordion";
import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";

const Faq = () => {
  const router = useRouter();
  const { t } = useTranslation("common");

  const qa = [
    {
      id: "001",
      title: t("FAQ.Questions_title1"),
      detail1: t("FAQ.Questions_title1_detail1"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "002",
      title: t("FAQ.Questions_title4"),
      detail1: t("FAQ.Questions_title4_detail4"),
      detail2: t("FAQ.Questions_title4_detail4_1"),
      H6title1: t("FAQ.Questions_title4_detail4_22"),
      detail3: t("FAQ.Questions_title4_detail4_2"),
      detail4: t("FAQ.Questions_title4_detail4_3"),
      detail44: t("FAQ.Questions_title4_detail4_3"),
      link1: "https://goo.gl/maps/HbgoiFezRem2H4ZC8",
      link2: "https://goo.gl/maps/BmHFeiY9YcFEL22QA",
      link3: "",
      H6title2: t("FAQ.Questions_title4_detail4_4"),
      detail5: t("FAQ.Questions_title4_detail4_5"),
    },
    {
      id: "003",
      title: t("FAQ.Questions_title2"),
      detail1: t("FAQ.Questions_title2_detail2"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: t("FAQ.More"),
      detail44: "",
      link1: "https://www.thailandpostmart.com/product/1013460000816/",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "004",
      title: t("FAQ.Questions_title5"),
      detail1: t("FAQ.Questions_title5_detail5"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: " ",
      detail44: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },

    {
      id: "005",
      title: t("FAQ.Questions_title3"),
      detail1: t("FAQ.Questions_title3_detail3"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: " ",
      detail44: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
  ];

  const faq = [
    {
      id: "001",
      title: t("FAQ.About_title1"),
      detail1: t("FAQ.About_title1_detail1"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "002",
      title: t("FAQ.About_title2"),
      detail1: t("FAQ.About_title2_detail2"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "คลิกที่นี่",
      link1: "/register",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "003",
      title: t("FAQ.About_title3"),
      detail1: t("FAQ.About_title3_detail3"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "004",
      title: t("FAQ.About_title4"),
      detail1: t("FAQ.About_title4_detail4"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "005",
      title: t("FAQ.About_title5"),
      detail1: t("FAQ.About_title5_detail5"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: " ",
      detail44: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "006",
      title: t("FAQ.About_title6"),
      detail1: t("FAQ.About_title6_detail6"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: " ",
      detail44: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "007",
      title: t("FAQ.About_title7"),
      detail1: t("FAQ.About_title7_detail7"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "008",
      title: t("FAQ.About_title8"),
      detail1: t("FAQ.About_title8_detail8"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "009",
      title: t("FAQ.About_title9"),
      html: (
        <>
          <ul>
            <li>
              <b>Mint</b> {t("FAQ.About_title9_detail9")},
            </li>
            <li>
              <b>Wallet id</b> {t("FAQ.About_title9_detail9_1")} <b>Wallet address</b> {t("FAQ.About_title9_detail9_2")}
            </li>
            <li>
              <b>Gas</b> {t("FAQ.About_title9_detail9_3")}
            </li>
            <li>
              <b>Exchange</b> {t("FAQ.About_title9_detail9_4")}
            </li>
          </ul>
        </>
      ),
    },
    {
      id: "010",
      title: t("FAQ.About_title10"),
      detail1: t("FAQ.About_title10_detail10"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
  ];

  const wallet = [
    {
      id: "001",
      title: t("FAQ.Wallet_title1"),
      detail1: t("FAQ.Wallet_title1_detail1"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "002",
      title: t("FAQ.Wallet_title2"),
      detail1: t("FAQ.Wallet_title2_detail2"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
    {
      id: "003",
      title: t("FAQ.Wallet_title3"),
      detail1: t("FAQ.Wallet_title3_detail3"),
      detail2: "",
      H6title1: "",
      detail3: "",
      detail4: "",
      link1: "",
      link2: "",
      link3: "",
      H6title2: "",
      detail5: "",
    },
  ];

  const ContentOne = (title) => {
    return (
      <div className="row">
        {qa.map((item, index) => (
          <div key={index} className=" col-lg-6 col-12 mb-lg-0">
            <Accordion defaultActiveKey="0" className="accordion-terms" flush>
              <Accordion.Item eventKey={item.id}>
                <Accordion.Header>{item.title}</Accordion.Header>
                <Accordion.Body>
                  <p> {item.detail1}</p>
                  <p> {item.detail2}</p>
                  <h6 className="mb-0 mt-2">{item.H6title1}</h6>
                  <p> {item.detail3}</p>
                  <p>
                    {" "}
                    <a className=" ci-color-orange  " href={item.link1}>
                      {item.detail4}
                    </a>
                  </p>
                  <h6 className="mb-0 mt-2">{item.H6title2}</h6>
                  <p> {item.detail5}</p>
                  <p>
                    {" "}
                    <a className=" ci-color-orange  " href={item.link2}>
                      {item.detail44}
                    </a>
                  </p>
                </Accordion.Body>
              </Accordion.Item>
            </Accordion>
          </div>
        ))}
      </div>
    );
  };

  const ContentTwo = () => {
    return (
      <div className="row">
        {faq.map((item, index) => (
          <div key={index} className=" col-lg-6 col-12 mb-lg-0">
            <Accordion defaultActiveKey="2" className="accordion-terms" flush>
              <Accordion.Item eventKey={item.id}>
                <Accordion.Header>{item.title}</Accordion.Header>
                <Accordion.Body>
                  <p> {item.detail1}</p>
                  <p> {item.detail2}</p>
                  <h6 className="mb-0 mt-2">{item.H6title1}</h6>
                  <p> {item.detail3}</p>
                  <p>
                    {" "}
                    <a className=" ci-color-orange  " href={item.link1}>
                      {item.detail4}
                    </a>
                  </p>
                  <h6 className="mb-0 mt-2">{item.H6title2}</h6>
                  <p> {item.detail5}</p>
                  <p>
                    {" "}
                    <a className=" ci-color-orange  " href={item.link2}>
                      {item.detail44}
                    </a>
                  </p>
                  {item.html}
                </Accordion.Body>
              </Accordion.Item>
            </Accordion>
          </div>
        ))}
      </div>
    );
  };
  const ContentThree = (title) => {
    return (
      <div className="row">
        {wallet.map((item, index) => (
          <div key={index} className=" col-lg-6 col-12 mb-lg-0">
            <Accordion defaultActiveKey="2" className="accordion-terms" flush>
              <Accordion.Item eventKey={item.id}>
                <Accordion.Header>{item.title}</Accordion.Header>
                <Accordion.Body>
                  <p> {item.detail1}</p>
                  <p> {item.detail2}</p>
                  <h6 className="mb-0 mt-2">{item.H6title1}</h6>
                  <p> {item.detail3}</p>
                  <p>
                    {" "}
                    <a className=" ci-color-orange  " href={item.link1}>
                      {item.detail4}
                    </a>
                  </p>
                  <h6 className="mb-0 mt-2">{item.H6title2}</h6>
                  <p> {item.detail5}</p>
                  <p>
                    {" "}
                    <a className=" ci-color-orange  " href={item.link2}>
                      {item.detail44}
                    </a>
                  </p>
                </Accordion.Body>
              </Accordion.Item>
            </Accordion>
          </div>
        ))}
      </div>
    );
  };

  const tabContent = [
    {
      id: 1,
      heading: t("FAQ.Questions"),
      content: () => <ContentOne />,
    },
    {
      id: 2,
      heading: t("FAQ.About"),
      content: () => <ContentTwo />,
    },
    {
      id: 3,
      heading: t("FAQ.Wallet"),
      content: () => <ContentThree />,
    },
  ];

  const [activeTab, setActiveTab] = useState(1);
  const [currentTab, setCurrentTab] = useState(tabContent[0]);

  function handleTabClick(currentTab) {
    setActiveTab(currentTab);
    const currentTabContent = tabContent.filter((item) => item.id === currentTab);
    setCurrentTab(currentTabContent[0]);
  }

  return (
    <section className="ci-bg-blue-V1 section-padding" id="FAQ">
      <div className="container">
        <div className="row">
          <div className="col-lg-6 col-12">
            <h2 className="text-primary">{t("FAQ.title1")}</h2>
          </div>
          <div className="d-flex justify-content-end col-lg-6 col-12 mb-4 mb-lg-0">
            {tabContent.map((item) => {
              return (
                <div
                  key={item.id}
                  className={` cursor-pointer btn-tabs-FAQ mx-2
                                      ${activeTab === item.id && "btn-tabs-FAQ-active"}
                                  `}
                  onClick={() => handleTabClick(item.id)}
                >
                  <p className="my-auto mx-auto text-center">{item.heading}</p>
                </div>
              );
            })}
          </div>
          <div className="col-12">{currentTab.content().type(currentTab.heading)}</div>
        </div>
      </div>
    </section>
  );
};
export default Faq;
