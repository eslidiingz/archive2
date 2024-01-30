import React, { Component } from "react";
import Slider from "react-slick";
import Link from "next/link";
import SliderArrow from "./SliderArrow";

const card = [
    {
        hashtag: "#001",
        collection: "Collection",
        title: "1st NFT STAMP IN ASEAN",
        detail:
            " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
        image: "../../assets/image/stamp/image8.webp",
    },
    {
        hashtag: "#002",
        collection: "Collection",
        title: "1st NFT STAMP IN ASEAN",
        detail:
            " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
        image: "../../assets/image/stamp/image10.webp",
    },
    {
        hashtag: "#003",
        collection: "Collection",
        title: "1st NFT STAMP IN ASEAN",
        detail:
            " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
        image: "../../assets/image/stamp/image12.webp",
    },
    {
        hashtag: "#004",
        collection: "Collection",
        title: "1st NFT STAMP IN ASEAN",
        detail:
            " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
        image: "../../assets/image/stamp/image8.webp",
    },
];



const SliderCard = () => {


        const settings = {
            dots: false,
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            nextArrow: <SliderArrow direction="next"/>,
            prevArrow: <SliderArrow direction="prev"/>,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        };

        return (
            <>
                <Slider {...settings}>
                    {card.map((item) => (
                        <div className="col-3 " key={card.id}>
                            <div className="box-card-nft">
                                <img src={item.image} className="w-100" />
                                <div className="row p-2">
                                    <div className="col-6">
                                        <h6>
                                            <span className="badge ci-bg-orange">{item.hashtag}</span>
                                        </h6>
                                    </div>
                                    <div className="col-6 text-end">
                                        <p className="txt-detail-gray-V2 fw-semibold">
                                            {item.collection}
                                        </p>
                                    </div>
                                    <div className="col-12">
                                        <h5 className="txt-title-inventory">{item.title}</h5>
                                        <p className="txt-detail-inventory">{item.detail}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))}
                </Slider>
            </>
        );
    }

export default SliderCard