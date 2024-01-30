import React, { useState } from "react";
// import "./styles.css";

const faq = [
  {
    id: "001",
    title: "NFT คืออะไร?",
    detail:
      "  NFT ย่อมาจาก Non-Fungible Token คือ สินทรัพย์ดิจิทัลที่ทดแทนกันไม่ได้ เป็นสินทรัพย์ แห่งอนาคต มีไว้เพื่อการสะสม หรือสามารถเกิดประโยชน์ต่อยอดในอนาคต และใช้แสดงNFT ย่อมาจาก Non-Fungible Token คือ สินทรัพย์ดิจิทัลที่ทดแทนกันไม่ได้ เป็นสินทรัพย์ แห่งอนาคต มีไว้เพื่อการสะสม หรือสามารถเกิดประโยชน์ต่อยอดในอนาคต และใช้แสดงNFT ย่อมาจาก Non-Fungible Token คือ สินทรัพย์ดิจิทัลที่ทดแทนกันไม่ได้ เป็นสินทรัพย์ แห่งอนาคต มีไว้เพื่อการสะสม หรือสามารถเกิดประโยชน์ต่อยอดในอนาคต และใช้แสดง",
  },
  {
    id: "002",
    title: "ความหมายของคำศัพท์ในวงการ NFT",
    detail:
      "Mint = ขั้นตอนที่ระบบโปรแกรมสร้าง token ซึ่งในที่นี้คือการสร้าง NFT และจดบันทึกว่า ผู้ที่เป็นคน mint งาน คือเจ้าของ NFT ชิ้นนั้น เพื่อบันทึกลงบน Blockchain",
  },
  {
    id: "003",
    title: "MetaMask คืออะไร?",
    detail:
      "MetaMask หรือ MetaMask Wallet คือกระเป๋าสินทรัพย์ดิจิทัลที่สามารถเชื่อมต่อกับ blockchain ต่างๆ และสามารถใช้งาน decentralized application หรือ dApps ต่างๆ รวมถึงสามารถใช้ใน",
  },
  {
    id: "004",
    title: "ทำไมจึงต้องใช้ MetaMask",
    detail:
      "NFT หรือ Non-Fungible Token นั้นคือสินทรัพย์ดิจิทัลชนิดหนึ่ง ที่มีเอกลักษณ์เป็นทรัพย์สิน ดิจิทัลที่มีเพียงชิ้นเดียวเท่านั้น ไม่สามารถคัดลอกได้ จึงสามารถใช้เพื่อแสดงความเป็นเจ้า",
  },
  {
    id: "005",
    title: "หาก seed phrase สูญหาย สามารถกู้ข้อมูลคืนมาได้หรือไม่?",
    detail:
      "MetaMask หรือ MetaMask Wallet คือกระเป๋าสินทรัพย์ดิจิทัลที่สามารถเชื่อมต่อกับ blockchain ต่างๆ และสามารถใช้งาน decentralized application หรือ dApps ต่างๆ รวมถึงสามารถใช้ใน",
  },
  {
    id: "006",
    title: "ถ้าต้องการทำการซื้อขาย NFT ต้องทำอย่างไร",
    detail:
      "NFT หรือ Non-Fungible Token นั้นคือสินทรัพย์ดิจิทัลชนิดหนึ่ง ที่มีเอกลักษณ์เป็นทรัพย์สิน ดิจิทัลที่มีเพียงชิ้นเดียวเท่านั้น ไม่สามารถคัดลอกได้ จึงสามารถใช้เพื่อแสดงความเป็นเจ้า",
  },
  {
    id: "007",
    title: "หากไม่มี Wallet สามารถรับ NFT ได้หรือไม่",
    detail:
      " หากไม่มี wallet หรือกระเป๋าสินทรัพย์ดิจิทัล จะไม่สามารถรับ NFT ได้เนื่องจาก NFT เป็นสิน ทรัพย์ดิจิทัลที่โอนย้ายได้ผ่าน blockchain เท่านั้น และผู้รับจะต้องมีกระเป๋าสินทรัพย์ดิจิทัล",
  },
  {
    id: "008",
    title: "คู่มือและวีดีโอ สำหรับ Creator",
    detail:
      " สิ่งที่ต้องมีในการใช้งานบน JNFT คู่มือ : https://bit.ly/3qIcShG | วีดีโอ : https://bit.ly/35C6AIr",
  },
];
const btn = {
  background: "transparent",
  border: "none",
  color: "#9EA1A2",
  borderBottom: "none",
};
export default function test() {
  return <FaqContent faq={faq} />;
}

const FaqItem = (props) => {
  console.log(props);
  const truncLength = 150;
  const [isShow, setShowHide] = useState(false);
  return (
    <div className="col-lg-6 col-12 px-lg-4 px-1 py-3">
      <h5 className="text-secondary">{props.title}</h5>
      <p className="txt-detail-gray">
        {" "}
        {isShow ? props.detail : props.detail.substring(0, truncLength)}{" "}
      </p>
      <button
        className="px-0"
        style={btn}
        onClick={() => setShowHide((previous) => !previous)}
      >
        {isShow ? "ปิด" : "อ่านต่อ"}
        <i className="fal fa-angle-down ms-2"></i>
      </button>
    </div>
  );
};

const FaqContent = (props) => {
  return (
    <section className="ci-bg-blue-V1 section-padding" id="FAQ">
      <div className="container">
        <div className="row">
          <div className="col-12 text-center mb-5">
            <h3 className="ci-color-orange">คำถามที่พบบ่อย (FAQ)</h3>
          </div>
          {props.faq.map((faq, _) => (
            <FaqItem {...faq} key={_} />
          ))}
        </div>
      </div>
    </section>
  );
};
