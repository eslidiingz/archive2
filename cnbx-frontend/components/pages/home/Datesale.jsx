// import Link from "next/link"
// import React, { useState, useRef, useEffect } from 'react';
// import Accordion from 'react-bootstrap/Accordion';

// function Datesale() {

//     return (
//         <div>
//             <section className="hilight-section_datesale">
//                 <div className="container">
//                     <div className="row">
//                         <div className="col-12 text-center mt-4">
//                             <p className="text-tittle-main_datesale">วันเวลาและช่องทางจำหน่ายแสตมป์ชุด “คริปโทแสตมป์”</p>
//                             <p className="detail_text-datesale">*For international shipment please contact cs_stamp@thailandpost.com*</p>
//                         </div>
//                         <div className="col-12">
//                             <Accordion defaultActiveKey="0" className="accordion-terms" flush>
//                                 <Accordion.Item eventKey="1">
//                                     <Accordion.Header>
//                                         <p className="tittle_datesale">เปิดจองล่วงหน้า</p>
//                                     </Accordion.Header>
//                                     <Accordion.Body>
//                                         <div className="d-flex align-items-center detail_datesale">
//                                             <p>1 สิงหาคม 2565 เป็นต้นไป เฉพาะที่</p>
//                                             <Link href={"www.thailandpostmart.com"}>
//                                                 <a target="_blank" className="detailLink_datesale ms-1">
//                                                     www.thailandpostmart.com
//                                                 </a>
//                                             </Link>
//                                         </div>
//                                     </Accordion.Body>
//                                 </Accordion.Item>
//                                 <Accordion.Item eventKey="2">
//                                     <Accordion.Header>
//                                         <p className="tittle_datesale">วันแรกที่จำหน่าย</p>
//                                     </Accordion.Header>
//                                     <Accordion.Body>
//                                         <div className="d-flex align-items-center detail_datesale">
//                                             <p>14 สิงหาคม 2565 </p>
//                                         </div>
//                                     </Accordion.Body>
//                                 </Accordion.Item>
//                                 <Accordion.Item eventKey="3">
//                                     <Accordion.Header>
//                                         <p className="tittle_datesale">จุดจำหน่าย</p>
//                                     </Accordion.Header>
//                                     <Accordion.Body>
//                                         <p className="detail_datesale mb-2">พิพิธภัณฑ์ตราไปรษณียากรสามเสนใน (8.30-16.30 น. วันพุธ-อาทิตย์ โทร.02 271 2439) ไปรษณีย์กลางบางรัก</p>
//                                         <Link href={"www.thailandpostmart.com"}>
//                                             <a target="_blank" className="detail_datesale mb-2">
//                                                 Line@ : @stampinlove
//                                             </a>
//                                         </Link>
//                                         <div className="d-flex align-items-center detail_datesale">
//                                             <Link href={"www.thailandpostmart.com"}>
//                                                 <a target="_blank" className="detailLink_datesale">
//                                                     www.thailandpostmart.com
//                                                 </a>
//                                             </Link>
//                                             <p className="detail_datesale ms-1">(24hrs)</p>
//                                         </div>
//                                     </Accordion.Body>
//                                 </Accordion.Item>
//                             </Accordion>
//                         </div>
//                     </div>
//                 </div>
//             </section>
//         </div>

//     )
// }
// export default Datesale

import React, { useState } from "react";

const Datesale = () => {
  const ContentOne = (title) => {
    return (
      <div>
        <div className="d-flex align-items-center detail_datesale">
          <p>14 สิงหาคม 2565 </p>
        </div>
      </div>
    );
  };
  const ContentTwo = (title) => {
    return (
      <div>
        <div className="d-flex align-items-center detail_datesale">
          <p>Content two</p>
        </div>
      </div>
    );
  };

  const tabContent = [
    {
      id: 1,
      heading: "Logs",
      content: (heading) => <ContentOne />,
    },
    {
      id: 2,
      heading: "Creativity",
      content: (heading) => <ContentTwo />,
    },
  ];

  const [activeTab, setActiveTab] = useState(1);
  const [currentTab, setCurrentTab] = useState(tabContent[0]);

  function handleTabClick(currentTab) {
    setActiveTab(currentTab);
    const currentTabContent = tabContent.filter(
      (item) => item.id === currentTab
    );
    setCurrentTab(currentTabContent[0]);
  }

  console.log(currentTab.content(currentTab.heading));

  return (
    <div className="py-10 px-20 text-center">
      <div className="mx-auto w-8/12 p-4">
        <div className="row">
          <div className="flex flex-wrap justify-around items-center col-6">
            {tabContent.map((item) => {
              return (
                <div
                  key={item.id}
                  className={`p-4 cursor-pointer w-4/12 border border-gray-100 
                                        ${
                                          activeTab === item.id &&
                                          "bg-yellow-400"
                                        }
                                    `}
                  onClick={() => handleTabClick(item.id)}
                >
                  <p className="my-auto mx-auto text-center">{item.heading}</p>
                </div>
              );
            })}
          </div>
          <div className="col-6">
            <div className="p-4">
              {currentTab.content().type(currentTab.heading)}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};
export default Datesale;
