import React, { useState } from "react";
import Link from "next/link";
// import "./styles.css";

const faq = [
  {
    id: "001",
    title: "คริปโทแสตมป์” คืออะไร?",
    detail:
      " แสตมป์ที่ระลึกที่บ.ไปรษณีย์ไทยจัดทำขึ้น ชนิดราคา 140 บาท ออกจำหน่ายวันที่ 14 สิงหาคม 65 เป็นต้นไป ความพิเศษของแสตมป์ชุดนี้คือ จัดทำเป็นแพ็คเกจสวยงาม และมีแถบขูดรหัสเพื่อนำไปสุ่มรับ NFT ที่จัดทำขึ้นไม่ซ้ำแบบถึง 50,000 ดีไซน์ โดยร่วมมือกับศิลปินไทยแนวหน้าของวงการ NFT นับเป็นแสตมป์ NFT ดวงแรกของอาเซียน",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "002",
    title: "NFT คืออะไร?",
    detail:
      "NFT ย่อมาจาก Non-Fungible Token คือ สินทรัพย์ดิจิทัลแห่งอนาคต ไม่สามารถทดแทนกันได้ มีไว้เพื่อการสะสม หรือสามารถเกิดประโยชน์ต่อยอดในอนาคต ไม่สามารถแก้ไข หรือปลอมแปลงได้ เนื่องจากถูกบันทึกไว้บนระบบ Blockchain เป็นสินทรัพย์ที่กำลังจะเป็นเทรนด์ของโลกในอนาคต",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "003",
    title: "แลกรับ NFT ได้ที่ไหน?",
    detail:
      "เมื่อคุณเป็นเจ้าของแสตมป์ชุด คริปโทแสตมป์เรียบร้อยแล้ว ให้ขูดแถบรหัสที่อยู่บนแผ่นแสตมป์ และนำหมายเลขมาลงทะเบียนเพื่อรับ NFT ได้ที่ nft.thailandpost.com ขั้นตอนการลงทะเบียน ",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "คลิกที่นี่",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "004",
    title: "มีค่าใช้จ่ายหรือค่าธรรมเนียมในการแลกรับ NFT หรือไม่?",
    detail:
      "ไปรษณีย์ไทยแจก NFT ให้แก่ลูกค้าโดยไม่มีค่าธรรมเนียมใดๆ เพียงซื้อแสตมป์ชุด “คริปโทแสตมป์” นำรหัสที่ได้มาลงทะเบียนรับ NFT ได้ฟรี ตามขั้นตอนที่กำหนด",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "005",
    title: "สามารถนำ NFT ไปทำอะไรได้บ้าง?",
    detail:
      "นอกจากสะสมเป็นชิ้นงานศิลปะ ผู้ครอบครองสามารถนำไปขาย ประมูลหรือมอบให้ผู้อื่นต่อบน Platform JNFT ได้ แต่ไม่สามารถนำมาแลกเปลี่ยนเป็นเงินสดกับทางไปรษณีย์ไทยได้ รวมถึงสามารถเซฟไฟล์ภาพออกมาเพื่อใช้ใน Social Networks ได้ เช่น นำไปเป็นภาพ Profile Picture, โพสต์บนสื่อโซเชียล หรืออินเตอร์เน็ต แต่ไม่อนุญาตให้ทำการดัดแปลง หรือเผยแพร่ในช่องทางสื่อสาธารณะ อาทิ ใบปลิว, TV, ป้ายขนาดใหญ่, Digital Signage",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "006",
    title: "สามารถสั่งซื้อสั่งจองได้ที่ไหน? เมื่อไร?",
    detail:
      "วิธีที่ 1 : เริ่มสั่งจองได้ที่ www.thailandpostmart.com ตั้งแต่วันที่ 1 สิงหาคม 2565 เป็นต้นไป จำกัดไม่เกินบัญชีละ 10 ชุด จัดส่งฟรี เมื่อซื้อสินค้าครบ 500 บาท หากไม่ถึง มีค่าจัดส่ง 50 บาท จัดส่งภายใน 2-3 สัปดาห์ ",
    detail_2:
      "วิธีที่ 2 : ซื้อได้ที่เคาน์เตอร์จำหน่ายแสตมป์ ณ ไปรษณีย์กลาง และพิพิธภัณฑ์ตราไปรษณียากรสามเสนใน ตั้งแต่วันที่ 14 สิงหาคม 2565 เป็นต้นไป",
    detail_3:
      "ไปรษณีย์กลาง เปิดทำการวันจันทร์ - ศุกร์ เวลา 8:00 – 18:00 น. / เสาร์ เวลา 8:00 – 13:00 น. / อาทิตย์ เวลา 8:00 – 12:00 น. โทร. 02-614-7455",
    detail_4:
      "พิพิธภัณฑ์ตราไปรษณียากรสามเสนใน วันพุธ-อาทิตย์ เวลา 8:30 - 16:30 น. โทร. 02 271 2439",
    href: "#",
    text_href: "",
    href2: "https://goo.gl/maps/HbgoiFezRem2H4ZC8",
    text_href2: "คลิกเพื่อดูเส้นทาง",
    href3: "https://goo.gl/maps/BmHFeiY9YcFEL22QA",
    text_href3: "คลิกเพื่อดูเส้นทาง",
  },
  {
    id: "007",
    title: "สมาชิกแสตมป์ไทยจะได้รับแสตมป์ชุดนี้หรือไม่? ต้องสั่งจองไหม?",
    detail:
      "สมาชิกแสตมป์ไทยที่มีคำสั่งแสตมป์ที่ระลึก และมียอดเงินเพียงพอภายในวันที่ 14 สิงหาคม 2565 จะได้รับอัตโนมัติ บัญชีละ 1 ชุดเท่านั้น หากต้องการเพิ่มเติมสามารถสั่งซื้อเพิ่มเติมได้ที่ Thailandpostmart.com ไปรษณีย์กลาง และพิพิธภัณฑ์ตราไปรษณียากรสามเสนใน ",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "ดูรายละเอียดที่นี่",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "008",
    title:
      "คริปโทแสตมป์ หรือ NFT สามารถใช้แทนค่าฝากส่งในระบบไปรษณีย์ได้หรือไม่?",
    detail:
      " คริปโทแสตมป์ จัดทำเป็นแบบแสตมป์สติกเกอร์ ในชนิดราคา 140 บาท จึงสามารถนำไปใช้ตามมูลค่าหน้าดวง 140 บาทได้เหมือนกับแสตมป์ปกติ ส่วน NFT ที่ได้จากการลงทะเบียน ซึ่งจะอยู่บน Blockchain ไม่สามารถนำไปใช้เป็นค่าฝากส่งได้",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "009",
    title: "หากใช้แสตมป์ติดส่งไปแล้ว ยังได้รับ NFT อยู่ไหม?",
    detail:
      "NFT ที่แถมจะได้จากการนำรหัสหลังแถบขูดบนแผ่นแสตมป์ไปลงทะเบียน หากรหัสยังอยู่ แม้จะใช้แสตมป์แทนค่าฝากส่งไปแล้ว ยังนำมารับ NFT ได้ตามปกติ จนถึง 14 สิงหาคม 2566 หรือจนกว่าจะมีการเปลี่ยนแปลงได้",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
  {
    id: "010",
    title:
      "มีของที่ระลึก ชีต หรือซองวันแรกจำหน่ายของแสตมป์ชุด คริปโทแสตมป์หรือไม่?",
    detail: "ไม่มี",
    detail_2: "",
    detail_3: "",
    detail_4: "",
    href: "#",
    text_href: "",
    href2: "#",
    text_href2: "",
    href3: "#",
    text_href3: "",
  },
];
const btn = {
  background: "transparent",
  border: "none",
  color: "#9EA1A2",
  borderBottom: "none",
};
export default function Faq() {
  return <FaqContent faq={faq} />;
}

const FaqItem = (props) => {
  console.log(props);
  const truncLength = 100;
  const truncLengthLink = 0;
  const [isShow, setShowHide] = useState(false);
  return (
    <div className="col-lg-6 col-12 px-lg-4 px-1 py-3" key={props.id}>
      <h5 className="text-secondary">{props.title}</h5>
      <div>
        <p className="txt-detail-gray">
          {" "}
          {isShow ? props.detail : props.detail.substring(0, truncLength)}{" "}
          <Link href={props.href}>
            <a className="txt-detail-gray">
              {" "}
              {isShow
                ? props.text_href
                : props.text_href.substring(0, truncLengthLink)}{" "}
            </a>
          </Link>
          {isShow ? "" : "..."}
        </p>
        <p className="txt-detail-gray">
          {" "}
          {isShow
            ? props.detail_2
            : props.detail_2.substring(0, truncLengthLink)}{" "}
        </p>
        <p className="txt-detail-gray mt-4 mb-1">
          {" "}
          {isShow
            ? props.detail_3
            : props.detail_3.substring(0, truncLengthLink)}{" "}
        </p>
        <Link href={props.href2}>
          <a className="txt-detail-gray" target="_blank">
            {" "}
            {isShow
              ? props.text_href2
              : props.text_href2.substring(0, truncLengthLink)}{" "}
          </a>
        </Link>
        <p className="txt-detail-gray mt-4 mb-1">
          {" "}
          {isShow
            ? props.detail_4
            : props.detail_4.substring(0, truncLengthLink)}{" "}
        </p>
        <Link href={props.href3}>
          <a className="txt-detail-gray" target="_blank">
            {" "}
            {isShow
              ? props.text_href3
              : props.text_href3.substring(0, truncLengthLink)}{" "}
          </a>
        </Link>
      </div>
      <button
        className="px-0"
        style={btn}
        onClick={() => setShowHide((previous) => !previous)}
      >
        {isShow ? "ปิด" : "อ่านต่อ"}
        {isShow ? (
          <i className="fal fa-angle-up ms-2"></i>
        ) : (
          <i className="fal fa-angle-down ms-2"></i>
        )}
      </button>
    </div>
  );
};

const FaqContent = (props) => {
  return (
    <section className="ci-bg-blue-V1 section-padding">
      <div id="FAQ" className="idpoint"></div>
      <div className="container">
        <div className="row">
          <div className="col-12 text-center mb-5">
            <h3 className="ci-color-orange">คำถามที่พบบ่อย (FAQ)</h3>
          </div>
          {props.faq.map((faq) => (
            <FaqItem {...faq} key={props.id} />
          ))}
        </div>
      </div>
    </section>
  );
};
