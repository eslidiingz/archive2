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

function ComuDetail() {
  const [showArtist, setShowArtist] = useState(false);
  const onShowArtist = () => {
    setShowArtist(true);
  };
  const onCloseArtist = () => {
    setShowArtist(false);
  };

  const [show, setShow] = useState(0);
  const onShow = (index) => {
    setShowArtist(true);
    setShow(index);
  };

  
  
  const Comu = [
    {
      id: "001",
      name: "PunkKub NFT",
      avatar: "PunkKubNFT.jpg",
      link: "https://www.facebook.com/PunkKubNFTs/",
      imgSet: [
        {img: "PunkKubNFT1.jpg"},
        {img: "PunkKubNFT2.jpg"},
        {img: "PunkKubNFT3.jpg"},
        {img: "PunkKubNFT4.jpg"},
        {img: "PunkKubNFT5.jpg"},
        {img: "PunkKubNFT6.jpg"},
        {img: "PunkKubNFT7.jpg"},
        {img: "PunkKubNFT8.jpg"},
      ],
      desc: "ความชอบในตัว Pixel art และ Smart Contract ทำให้เกิดเป็นงานนี้ขึ้นมา"
    },
    {
      id: "002",
      name: "THE SAVE PLANET",
      avatar: "Saveplanet.jpg",
      link: "https://www.thesaveplanet.world/",
      imgSet: [
        {img: "Saveplanet1.jpg"},
        {img: "Saveplanet2.jpg"},
        {img: "Saveplanet3.jpg"},
        {img: "Saveplanet4.jpg"},
        {img: "Saveplanet5.jpg"},
        {img: "Saveplanet6.jpg"},
        {img: "Saveplanet7.jpg"},
      ],
      desc: "แรงบันดาลใจได้มาจาก เป็นคนชอบเที่ยวธรรมชาติเป็นทุนเดิมเลยอยากสื่อสาร NFT ที่เป็น สไตล์ ธรรมชาติกับพลังงานเป็น ภูติจิ๋ว ที่ชื่อว่า ZILLAFRENS "
    },
    {
      id: "003",
      name: "BitToon",
      avatar: "BitToon.jpg",
      link: "https://bittoondao.com/",
      imgSet: [
        {img: "Bittoon1.jpg"},
        {img: "Bittoon2.jpg"},
        {img: "Bittoon3.jpg"},
        {img: "Bittoon4.jpg"},
        {img: "Bittoon5.jpg"},
        {img: "Bittoon6.jpg"},
        {img: "Bittoon7.jpg"},
      ],
      desc: "BitToon ได้รับแรงบันดาลใจมากจาก เหรียญ Cryptocurrency ต่างๆ ซึ่งแต่ละเหรียญ​แต่ละโปรเจคนั้น ส่วนใหญ่มีเป้าหมายที่ต่างกัน วิธีการดำเนินงานของโปรเจคที่ต่างกัน จนแสดงออกมาเป็นลักษณะนิสัยได้ และตัว BitToon นั้นเป็นตัวแทนของ Bitcoin เหรียญแรกของโลก"
    },
    {
      id: "004",
      name: "Zmile Monkeyz Club",
      avatar: "ZmileMonkeyzClub.jpg",
      link: "https://zmilemonkeyz.club/",
      imgSet: [
        {img: "ZmileMonkeyzClub1.jpg"},
        {img: "ZmileMonkeyzClub2.jpg"},
        {img: "ZmileMonkeyzClub3.jpg"},
        {img: "ZmileMonkeyzClub4.jpg"},
        {img: "ZmileMonkeyzClub5.jpg"},
        {img: "ZmileMonkeyzClub6.jpg"},
        {img: "ZmileMonkeyzClub7.jpg"},
        {img: "ZmileMonkeyzClub8.jpg"},
      ],
      desc: "โปรเจก Zmile Monkeyz Club เป็นการรวมตัวของกลุ่มคนที่รักในความสนุกและความบันเทิง เราจึงนึกถึงลิง เนื่องจากลิงเป็นสิ่งที่รวมกันอยู่เป็นกลุ่นอย่างซุกซน สนุกสนาน และสดใส เราเลยออกแบบตัวNFTเป็นเหล่าลิงหน้าทะเล้นที่กำลังยิ้มอยู่ "
    },
    {
      id: "005",
      name: "พ่อบ้านคริปโต",
      avatar: "PorBannCrypto.jpg",
      link: "https://www.facebook.com/PorbanCrypto",
      imgSet: [
        {img: "PorBannCrypto1.jpg"},
        {img: "PorBannCrypto2.jpg"},
        {img: "PorBannCrypto3.jpg"},
        {img: "PorBannCrypto4.jpg"},
        {img: "PorBannCrypto5.jpg"},
      ],
      desc: "สิงโตเป็นสัตว์ที่อยู่ด้านบนของห่วงโซ่อาหาร ซึ่งสามารถแสดงถึงความเป็นผู้นำ ความยิ่งใหญ่ และรวมไปถึงความอบอุ่นได้ด้วย จากลักษณะนิสัยที่ชอบอยู่กันเป็นครอบครัว ด้วยสีขนแผงคอที่ใช้สีม่วงเป็นเพราะอยากบ่งบอกถึงความเป็นเทคโนโลยี หรือเป็นเฉดสีของ Metaverse เช่นเดียวกัน"
    },
    {
      id: "006",
      name: "I Learn A Lot",
      avatar: "ILearnALot.jpg",
      link: "https://www.facebook.com/ILearnALotAboutBitcoin/",
      imgSet: [
        {img: "ILearnALot1.jpg"},
        {img: "ILearnALot2.jpg"},
        {img: "ILearnALot3.jpg"},
        {img: "ILearnALot4.jpg"},
        {img: "ILearnALot5.jpg"},
        {img: "ILearnALot6.jpg"},
        {img: "ILearnALot7.jpg"},
        {img: "ILearnALot8.jpg"},
      ],
      desc: "ความสนุกในโลกของการลงทุน"
    },
    {
      id: "007",
      name: "ApeKub",
      avatar: "ApeKub.jpg",
      link: "https://www.facebook.com/apekubnft",
      imgSet: [
        {img: "ApeKub1.jpg"},
        {img: "ApeKub2.jpg"},
        {img: "ApeKub3.jpg"},
        {img: "ApeKub4.jpg"},
        {img: "ApeKub5.jpg"},
        {img: "ApeKub6.jpg"},
        {img: "ApeKub7.jpg"},
        {img: "ApeKub8.jpg"},
      ],
      desc: "แรงบันดาลใจในการสร้างโปรเจค ApeKub เกิดจากการที่ได้เห็น Ape จำนวนมากโล่นแล่นอยู่ในโลกของ blockchain อาจจะฟังดูเสียมารยาทไปนิด แต่ทางผู้สร้างรู้สึกว่าไม่มี Ape ตัวใหนเท่และถูกใจเลยซักตัว(ความรู้สึกส่วนตัว) จึงเป็นจุดกำเนิดของ Ape ชุดนี้ ที่ทางผู้สร้างพยายามอย่างหนักเพื่อให้ ApeKub ออกมาเป็น Ape ที่หล่อเท่ และดูน่าสะสมถูกใจวัยรุ่นคริปโตอย่างที่เป็นอยู่ในปัจจุบัน อีกทั้งยังใส่ lore และ story ให้กับ Ape ระดับ SSR/UR เพื่อสร้างมิติให้กับ Art อย่างที่มันควรจะเป็น"
    },
    {
      id: "008",
      name: "Naga DAO",
      avatar: "NagaDAO.jpg",
      link: "https://www.facebook.com/nagadaonft/",
      imgSet: [
        {img: "NagaDAO1.jpg"},
        {img: "NagaDAO2.jpg"},
        {img: "NagaDAO3.jpg"},
        {img: "NagaDAO4.jpg"},
        {img: "NagaDAO5.jpg"},
        {img: "NagaDAO6.jpg"},
        {img: "NagaDAO7.jpg"},
        {img: "NagaDAO8.jpg"},
      ],
      desc: "ตัวคาร์เเรคเตอร์ Naga ได้เเรงบัลดาลใจมาจากชื่่อคอมมูเก่าของ DAO (New Gen : NG) ภายหลังได้เปลี่ยนมาเป็น Naga DAO เเละออกแบบมาสคอตประจำ DAO ให้มีลักษณะเข้าถึงง่าย น่ารัก ตัวนาค หรือนากา เป็นสัตว์ในเทพนิยาย ที่ทุกคนน่าจะเคยผ่านตากันมาไม่มากก็น้อย ด้วยรูปลักษณ์ที่ดูลึกลับ มีพลังอำนาจ เเละมีพิษ อาจทำให้ผู้คนรู้สึกเกรงกลัว ผู้ออกแบบตั้งใจให้นากามีรูปร่างกลมๆน่ารัก เข้าถึงง่ายมากยิ่งขึ้น เพื่อให้ผู้คนรู้สึกว่า Naga DAO เป็นมิตรกับทุกคนเช่นเดียวกับอุดมคติของ DAO นี้ "
    },
    {
      id: "009",
      name: "Jiger",
      avatar: "Jiger.jpg",
      link: "https://www.facebook.com/JNFTOfficial/",
      imgSet: [
        {img: "Jiger1.jpg"},
        {img: "Jiger2.jpg"},
        {img: "Jiger3.jpg"},
        {img: "Jiger4.jpg"},
        {img: "Jiger5.jpg"},
      ],
      desc: "JFIN ได้สร้าง Jiger The Tiger เป็นมาสคอต และเปิดตัวอย่างเป็นทางการเมื่อเดือนกุมภาพันธ์ปี 2565 Jiger เป็นตัวแทนของความแข็งแกร่ง เปี่ยมด้วยพลังงาน และมุ่งมั่น ในขณะเดียวกันเสือก็ยังมีความน่ารักในฐานะที่เป็นสิ่งมีชีวิตตระกูลแมว ทางศาสตร์ฮวงจุ้ย เสือ เป็นสัญลักษณ์ที่ได้รับการนำมาช่วยเสริมบารมี เสริมดวงการเงิน และเสริมให้ธุรกิจประสบความสำเร็จ"
    },
    {
      id: "010",
      name: "lazyman",
      avatar: "lazyman.jpg",
      link: "https://www.facebook.com/lazymannfts/",
      imgSet: [
        {img: "LazyMan1.jpg"},
        {img: "LazyMan2.jpg"},
        {img: "LazyMan3.jpg"},
        {img: "LazyMan4.jpg"},
        {img: "LazyMan5.jpg"},
        {img: "LazyMan6.jpg"},
        {img: "LazyMan7.jpg"},
        {img: "LazyMan8.jpg"},
      ],
      desc: "lazyman ทุกตัวไม่มีใบหน้า เพราะว่า อยากปิดบังตัวตน อยากหาตังโดยไม่ต้องทำงานและไม่ต้องออกไปทำงาน และ lazymanจะพักผ่อนจนไม่มีเวลาทำงาน"
    },
    {
      id: "011",
      name: "Hotel de Mentía",
      avatar: "HotelDementia.png",
      link: "https://hoteldementia.io/",
      imgSet: [
        {img: "HotelDementia1.jpg"},
        {img: "HotelDementia2.jpg"},
        {img: "HotelDementia3.jpg"},
        {img: "HotelDementia4.jpg"},
        {img: "HotelDementia5.jpg"},
        {img: "HotelDementia6.jpg"},
        {img: "HotelDementia7.jpg"},
      ],
      desc: "โปรเจกต์ Hotel de Mentía หรือโรงแรมหลงลืม เริ่มมาจากการที่เราเชื่อว่า คนเราต้องการสถานที่สถานที่หนึ่งที่ช่วยให้เราลืมทุกสิ่งอย่างไป ในวันที่เจอเรื่องร้าย ๆ เจอปัญหา หรือเศร้าใจ ส่วน character ของ Hotel de Mentía NFT เปรียบเสมือนแขกในโรงแรม ที่ถูกออกแบบเป็น 5 เผ่า ได้แก่ คน ผี หมาป่า แพะ ลิง โดยแต่ละเผ่าแสดงถึงลักษณะของแต่ละคนเวลาที่เจอปัญหา"
    },
    {
      id: "012",
      name: "Stocker DAO",
      avatar: "StockerDAO.jpg",
      link: "https://www.facebook.com/stockerdao/",
      imgSet: [
        {img: "StockerDAO1.jpg"},
        {img: "StockerDAO2.jpg"},
        {img: "StockerDAO3.jpg"},
        {img: "StockerDAO4.jpg"},
        {img: "StockerDAO5.jpg"},
        {img: "StockerDAO6.jpg"},
        {img: "StockerDAO7.jpg"},
        {img: "StockerDAO8.jpg"},
      ],
      desc: "มีการประยุกต์มาจากคาแร็คเตอร์ของเพจ Stocker Day ที่เป็นรูปดาวสีเหลือง ซึ่งโดย NFT เหล่านี้เป็น ตัวละครที่อยู่ใน metavarse ของโลกอนาคต แต่มีเหตุการ์ณอะไรบางอย่างที่ทำให้น้อง ๆ ถูกวาปกลับมายังโลกปัจจุบัน ที่ปกติจะเห็นเป็น 3d แต่สามารถปรากฎได้แค่รูปแบบ 2d ในอุปกรณ์อิเล็กทรอนิกส์ต่างๆ เท่านั้น เช่น มือถือ บิลบอร์ด TV เป็นต้น โดย NFT แต่ละตัวก็จะมีพลังมาจากพลังที่ influencer มี และมีรูปร่างเป็นหัวดาว เนื่องจากมันไปพ้องเสียงกับคำว่า Star ที่แปลว่าคนดัง หรือ Superstar นั่นเอง "
    },
    {
      id: "013",
      name: "เทรดเดอร์หน้าหมีแต่ชอบหมา",
      avatar: "TraderNaMee.jpg",
      link: "https://www.facebook.com/BearFaceTrader",
      imgSet: [
        {img: "BearFace1.jpg"},
        {img: "BearFace2.jpg"},
        {img: "BearFace3.jpg"},
        {img: "BearFace4.jpg"},
        {img: "BearFace5.jpg"},
        {img: "BearFace6.jpg"},
        {img: "BearFace7.jpg"},
        {img: "BearFace8.jpg"},
      ],
      desc: "เป็นคนหน้าเหมือนหมี ที่ชอบสุนัข และ รักการลงทุนเป็นชีวิตจิตใจ"
    },
    {
      id: "014",
      name: "Moo Monster",
      avatar: "MooMonster.jpg",
      link: "https://moo-monster.com/",
      imgSet: [
        {img: "MooMonster1.jpg"},
        {img: "MooMonster2.jpg"},
        {img: "MooMonster3.jpg"},
        {img: "MooMonster4.jpg"},
        {img: "MooMonster5.jpg"},
        {img: "MooMonster6.jpg"},
        {img: "MooMonster7.jpg"},
        {img: "MooMonster8.jpg"},
      ],
      desc: "Moo (*Moo เป็นชื่อที่ใช้เรียกตัวละครของ MooMonster) แรงบันดาลใจมาจากหมู และต้องการให้ดูน่ารัก โดดเด่น มีเอกลักษณ์ สามารถให้จดจำได้ง่าย แต่ผสมความกวนลงในตัวละครด้วย แนวความคิดในการออกแบบก็มาจากความชอบของทีมที่ชอบตัวละครหน้าตากวนๆ มีความทะเล้น ลายเส้นเรียบง่าย สีที่ดูฉูดฉาด ตัวละครของ MooMonster จึงมีความน่ารักปนกับความกวนของตัวละคร"
    },
    {
      id: "015",
      name: "Apetimism",
      avatar: "Apetimism.jpg",
      link: "https://apetimism.com/",
      imgSet: [
        {img: "Apetimism1.jpg"},
        {img: "Apetimism2.jpg"},
        {img: "Apetimism3.jpg"},
        {img: "Apetimism4.jpg"},
        {img: "Apetimism5.jpg"},
        {img: "Apetimism6.jpg"},
        {img: "Apetimism7.jpg"},
        {img: "Apetimism8.jpg"},
      ],
      desc: "โปรเจค Apetimism ถูกออกแบบมาด้วยความตั้งใจว่าจะทำเป็นธุรกิจตั้งแต่แรกเริ่ม ไม่ใช่แค่เพียงชิ้นงานศิลปะดิจิตอลเท่านั้น ทำให้ทุกรายละเอียดจึงถูกออกแบบมาให้เอื้ออำนวยต่อการต่อยอดเป็นธุรกิจในโลกจริง ด้วยเหตุนี้ตัวคาแรคเตอร์จึงถูกออกแบบมาให้เข้าถึงง่าย เป็นตัวที่มีความน่ารัก สามารถเข้าถึงได้ทุกเพศทุกวัย และสามารถเจาะเข้าถึงกลุ่มผู้เล่น NFT ได้โดยตรงด้วย ตัวละครจึงถูกสร้างมาในรูปแบบของ ลิง (Ape) เพราะเป็นสัตว์ที่ได้รับการยอมรับในระดับสากลในตลาด NFT ซึ่งจะเห็นได้ว่ามีคอลเลคชั่น NFT มากมายที่ถูกออกแบบมาในรูปของลิง และเนื่องจากเราตั้งใจจะสร้างธุรกิจขึ้นมาในโลกจริง เช่น ของเล่น ไม่ใช่แค่โลกดิจิตอลเท่านั้น ตัวละครจึงถูกสร้างมาในรูปแบบ 3 มิติ เพื่อให้ง่ายต่อการนำมาสร้างเป็นสินค้าในโลกจริง ในการออกแบบเราได้มองโอกาสด้วยว่า คาแรคเตอร์เราจะต้องสามารถนำไปเล่นกับแบรนด์อื่น ๆ ได้ เผื่อเราจะมีการทำงานร่วมกันในอนาคต เช่น กับไปรษณีย์ไทยนี้เราก็จะต้องให้ลิงของเราใส่ชุดพนักงานไปรษณีย์ไทยได้โดยง่าย ซึ่งจะช่วยให้เราต่อยอดธุรกิจได้ไปง่ายขึ้นมาก ด้วยเหตุนี้เราจึงออกแบบตัวละครของเราในรูปแบบของ Voxel หรือการเอาบล็อกมาต่อกันจนเป็นรูปร่างของลิง ซึ่งทำให้เราสามารถเพิ่มบล็อกเข้าไปได้เพื่อดัดแปลงตัวลิงให้เหมาะสมกับโอกาสต่าง ๆ ได้แทบทุกรูปแบบ นอกจากนั้นในอนาคตเรายังมีแผนจะนำตัวลิง Apetimism ของเราไปเดินเล่นใน Metaverse ด้วย ซึ่งทำได้ทันทีเพราะตัวละครของเราถูกออกแบบมาในลักษณะ 3 มิตินั่นเอง"
    },
    {
      id: "016",
      name: "Munins",
      avatar: "Munin.jpg",
      link: "https://www.facebook.com/cartoonmunin",
      imgSet: [
        {img: "Munin1.jpg"},
        {img: "Munin2.jpg"},
        {img: "Munin3.jpg"},
        {img: "Munin4.jpg"},
        {img: "Munin5.jpg"},
        {img: "Munin6.jpg"},
        {img: "Munin7.jpg"},
      ],
      desc: "เรา(มุนินฺ)ชอบวาดหน้าด้านข้างของคน และวาดเยอะมากในต้นฉบับการ์ตูน รู้สึกว่ามือมันคุ้นกับจังหวะการวาดโครงสร้างนี้มากๆ  เพราะสายตาของตัวละครนี่แหละ แค่ดวงตาแม้เพียงข้างเดียว ก็บอกเล่าเรื่องราวได้ เป็นที่มาของการตั้งชื่อ Collection ว่า B-SIDE เพราะการที่เราจะเห็นผู้คนในมุมนี้ ด้านนี้ ก็คือเราต้องไปยืนอยู่ข้างๆ (Beside) แล้วมองไปที่เขาเท่านั้น"
    },
    {
      id: "017",
      name: "Jaybird NFT Collection ",
      avatar: "JaybirdNFTCollection.jpg",
      link: "https://instore.jaymartstore.com/JayBird-NFT-Collection/",
      imgSet: [
        {img: "JaybirdNFTCollection1.jpg"},
        {img: "JaybirdNFTCollection2.jpg"},
        {img: "JaybirdNFTCollection3.jpg"},
        {img: "JaybirdNFTCollection4.jpg"},
        {img: "JaybirdNFTCollection5.jpg"},
      ],
      desc: "Jaybird เป็นตัวแทนของเจมาร์ท โดย Jaybird  แสดงถึงการสื่อสารไปยังลูกค้า ทั้งสินค้าและบริการ ด้วยลักษณะท่าทางที่สนุกสนาน เป็นมิตร และเข้าถึงง่าย รวมถึงให้ Jaybird มีสีแดง ซึ่งเป็นสีประจำของ เจมาร์ท "
    },
    {
      id: "018",
      name: "MetaWarden",
      avatar: "Metawaden.jpg",
      link: "https://www.facebook.com/wardenswap",
      imgSet: [
        {img: "Metawaden1.jpg"},
        {img: "Metawaden2.jpg"},
        {img: "Metawaden3.jpg"},
        {img: "Metawaden4.jpg"},
        {img: "Metawaden5.jpg"},
        {img: "Metawaden6.jpg"},
        {img: "Metawaden7.jpg"},
        {img: "Metawaden8.jpg"},
      ],
      desc: "ตัวคาแรกเตอร์ของ Warden มีแรงบันดาลใจจากตัวละคร Arc Warden ในเกมส์ DotA ตัว Warden นั้นถูกสร้างเพื่อเป็นคาแร็กเตอร์และเอกลักษณ์ของแพลตฟอร์มโดยมีที่มาจากแพลตฟอร์ม Alpaca และ pancake เราจึงสร้างตัวละคร Warden ขึ้นมา และใช้คีย์เวิร์ดคำว่า To the moon เป็นไอเดีย จึงได้มีการออกแบบเป็นนักบินอวกาศที่จะไปดวงจันทร์ และได้ใส่ดางตาที่มีลักษณะคล้ายดวงไฟที่เป็นเอกลักษณ์ของตัวละคร Arc Warden เข้าไป และได้มีการออกแบบรูปร่าง นิสัยให้มีความขี้เล่นเพื่อให้เข้าถึงได้ง่าย"
    },
    
    
  ];

  const test = [
    {
      id: "001",
      title: "ครั้งแรกของอาเซียน",
    },
    {
      id: "002",
      title: "ครั้งแรกกับศิลปิน NFT มากถึง 18 คาแรคเตอร์",
    },
    {
      id: "003",
      title: "NFT Legend ที่มีแค่ 140 ชิ้น ",
    },
  ];
    
  return (
    <>
      <div className={`commusection ${showArtist ? "d-none" : ""}`}>
        <div className="row mb-5 commu-warpper">
          {Comu.map((item, key) => (
            <div className="col-6 col-md-4 col-lg-3 col-xl-2 p-4 commucard" key={key}>
              <div className="comu-img">
                <Link href="#Speical">
                  <a onClick={() => onShow(key)}>
                    <img className="w-100"  src={`/assets/image/specialNFT/commu/${item.avatar}`} />
                  </a>
                </Link>
              </div>
              <p className="text-dark text-center text-bold">{item.name}</p>
            </div>
          ))}


        </div>
        <h3 className="text-primary text-center mb-5">จุดสังเกตุชื่อ NFT Community</h3>
        <div className="row mb-5">
          <div className="col-12 d-flex justify-content-center">
            <img className="intro-rarity  d-lg-block d-none" src="/assets/image/specialNFT/commu-name.svg" />
            <img className="intro-rarity  d-lg-none d-block" src="/assets/image/specialNFT/commu-show-mobile.svg" />
          </div>
        </div>
      </div>

      <div className={`test ${showArtist ? "" : "d-none"}`}>
        <div className="artist-commu mb-5">
            <div className="artist-img">
              <img className="w-100" src={`/assets/image/specialNFT/commu/${Comu[show].avatar}`} />
            </div>
            <div className="artist-desc">
              <h4 className="text-dark text-bold mb-2">{Comu[show].name}</h4>
              <p className="mb-3">{Comu[show].desc}</p>
              <Button
                variant="secondary"
                href="#Speical"
                onClick={onCloseArtist}
                className="me-2"
              ><i className="fas fa-chevron-left me-2"></i>ย้อนกลับ</Button>
              <Link href={Comu[show].link} passHref>
                <a target="_blank" rel="noopener noreferrer">
                  <Button
                    variant="primary"
                    className="px-3"
                  >เข้าสู่เว็บไซต์<i className="far fa-external-link-alt ms-2"></i></Button>
                
                </a>
              </Link>
            </div>
        </div>
        <h3 className="text-dark text-left ">ตัวอย่างผลงาน</h3>
        <div className="row mb-5">
            {Comu[show].imgSet.map((item, key) => (
              <div className="col-md-3 mb-4" key={key}>
                <img className="w-100" src={`/assets/image/specialNFT/commu/commu_assets/${item.img}`} />
              </div>
            ))}
            
        </div>
        

      </div>
    </>
  );
}
export default ComuDetail;
