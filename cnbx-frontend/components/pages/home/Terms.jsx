import Link from "next/link";
import React, { useState, useRef, useEffect } from "react";
import Accordion from "react-bootstrap/Accordion";
import { Container, Form, FormControl, Nav, Navbar, NavDropdown, Button, Dropdown, DropdownButton } from "react-bootstrap";
import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";

function Terms() {
  const [open, setOpen] = useState(false);
  const router = useRouter();
  const { t } = useTranslation("common");

  return (
    // <section className="hilight-section_howto01">
    //     <div className="container">
    //         <div className="row">
    //             <div className="col-12 text-center mt-4">
    //                 <h2 className="text-primary">เงื่อนไขข้อตกลง</h2>
    //                 <div className="ex1 text-left">
    //                     <h4 className="text-black ">ข้อตกลง และเงื่อนไขสิทธิในการครอบครอง และการนำไปใช้</h4>
    //                     <ul>
    //                         <li className="text-detail_terms">NFT ที่ทางไปรษณีย์ไทย ได้สร้างสรรค์ขึ้นมา เป็นการมอบให้ฟรีที่มูลค่าของ NFT ชิ้นนั้น แต่ในการรับ NFT ลูกค้าจำเป็นต้องเชื่อมต่อกระเป๋าสินทรัพย์ดิจิทัล เพื่อบันทึก NFT นั้น ทั้งนี้ ในการรับ NFT จะไม่มีค่าธรรมเนียมใดๆเกิดขึ้น โดยค่าธรรมเนียมเหล่านี้ ทางไปรษณีย์ไทย เป็นผู้รับผิดชอบทั้งสิ้น</li>
    //                         <li className="text-detail_terms"> เนื่องจาก NFT เป็นสินทรัพย์ดิจิตัลบนระบบบล็อกเชน ที่เมื่อบันทึกลงไปแล้ว จะไม่มีผู้ใดสามารถดัดแปลง หรือแก้ไขได้ รวมถึงทางไปรษณีย์ไทย ศิลปินผู้สร้างผลงาน และผู้ครอบครองชิ้นงานนั้นๆ เองด้วย จึงขอสงวนสิทธิ์ไม่แก้ไขข้อมูลต่างๆ ไฟล์ภาพ หรือลบออกจากระบบ ในทุกๆ กรณี
    //                         </li>
    //                         <li className="text-detail_terms"> NFT ทุกชิ้น ถูกสร้างโดยการผสมผสานภาพชิ้นส่วนต่างๆ ขึ้นมาโดยโปรแกรมในระบบสุ่ม เพื่อให้ 50,000 ชิ้นออกมาไม่เหมือนกัน
    //                         </li>
    //                         <li className="text-detail_terms">NFT เป็นชิ้นงานศิลปะเพื่อการสะสม และอยู่ในรูปแบบ NFT จริง บนบล็อกเชนที่ชื่อว่า JNFT โดยผู้ครอบครองสามารถนำไปขายต่อในตลาด NFT บนบล็อกเชนเดียวกันได้ แต่ไม่สามารถนำมาแลกเปลี่ยนเป็นเงินสดได
    //                         </li>
    //                         <li className="text-detail_terms">NFT ยังถือเป็นลิขสิทธิ์คาแร็คเตอร์ของ ไปรษณีย์ไทย ผู้สร้างสรรค์ผลงาน โดยผู้ครอบครอง แสตมป์ NFT ไม่สามารถนำไปจัดพิมพ์ ผลิตเป็นสินค้า ทำซ้ำ ดัดแปลง หรือนำไปใช้เพื่อการค้าในรูปแบบอื่น นอกเหนือจากการขายโอนกรรมสิทธิ์ในรูปแบบ NFT ผ่าน NFT Market เท่านั้น
    //                         </li>
    //                         <li className="text-detail_terms">ผู้ครอบครอง NFT สามารถเซฟไฟล์ภาพออกมาเพื่อใช้ในการแสดงออกในการครอบครองใน Social Networks ได้ เช่น นำไปเป็นภาพ Profile Picture, โพสต์บนสื่อโซเชียล หรืออินเตอร์เน็ต แต่ไม่อนุญาตให้ทำการดัดแปลง หรือเผยแพร่ในช่องทางสื่อสาธารณะ อาทิ ใบปลิว, TV, ป้ายขนาดใหญ่, Digital Signage
    //                         </li>
    //                         <li className="text-detail_terms">แสตมป์ NFT ที่ได้รับเป็น NFT ที่บันทึกอยู่บน JNFT โดยไม่จำกัดอายุการแสดงผล แต่ทั้งนั้น หากมีการเปลี่ยนแปลงบนระบบบล็อกเชนอาจเป็นไปได้ที่จะส่งผลถึง แสตมป์ NFT ไปด้วย
    //                         </li>
    //                         <li className="text-detail_terms">ผู้ครอบครอง NFT สามารถนำ NFT ที่ครอบครอง ไปใช้งานต่อได้บนเครือข่ายบล็อกเชน JFIN Chain และหาก NFT มีการพัฒนาระบบต่างๆ เสริมขึ้นมาเชื่อมต่อกับการนำ NFT ไปใช้งาน ก็ได้สิทธิ์อนุญาตในการนำไปใช้ได้ เช่น การนำไปตั้งขาย แลกเปลี่ยน บน Marketplace หรือการนำไปแสดงใน Virtual Gallery หรือ Metaverse ที่อาจเกิดขึ้นในอนาคต
    //                         </li>
    //                     </ul>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>
    // </section>

    <section>
      <div className="container">
        <div className="row">
          <div className="col-12 text-center mt-4">
            <h2 className="text-primary">{t("Terms.title1")}</h2>
          </div>
        </div>
        <div className="row">
          <div className="col-12">
            <Accordion defaultActiveKey="0" className="accordion-terms" flush>
              <Accordion.Item eventKey="0">
                <Accordion.Header>{t("Terms.title2")}</Accordion.Header>
                <Accordion.Body>
                  <ul>
                    <li className="text-detail_terms">{t("Terms.title3")}</li>
                    <li className="text-detail_terms"> {t("Terms.title4")}</li>
                    <li className="text-detail_terms"> {t("Terms.title5")}</li>
                    <li className="text-detail_terms">{t("Terms.title6")}</li>
                    <li className="text-detail_terms">{t("Terms.title7")}</li>
                    <li className="text-detail_terms">{t("Terms.title8")}</li>
                    <li className="text-detail_terms">{t("Terms.title9")}</li>
                    <li className="text-detail_terms">{t("Terms.title10")}</li>
                  </ul>
                </Accordion.Body>
              </Accordion.Item>
            </Accordion>
          </div>
        </div>
      </div>
    </section>
  );
}
export default Terms;
