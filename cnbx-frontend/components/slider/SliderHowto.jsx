import React, { Component } from "react";
import Slider from "react-slick";
import Link from "next/link";
import SliderArrow from "./SliderArrow";


const SliderHowto = () => {

    const settings = {
        dots: false,
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        nextArrow: <SliderArrow direction="next" />,
        prevArrow: <SliderArrow direction="prev" />,
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
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            }
        ]
    };

    return (
        <>
            <Slider {...settings} className="px-3">
                <div className="col-12 col-md-6">
                    <div className="d-flex justify-content-center align-items-center">
                        <p className="text-number_howto"> 1 </p>
                    </div>
                    <img className="w-100 mt-2 mb-4 pe-2" src="/assets/image/progress/image1.webp" />
                    <h5 className="text-secondary">ซื้อแสตมป์ในกลุ่ม คริปโทแสตมป์</h5>
                    <p className="text-detail_progress">สามารถสั่งซื้อคริปโทแสตม์ได้ที่ร้านออนไลน์ thailandpostmart.com โดยชุดแรกเริ่มวางจำหน่าย 14 สิงหาคม 2562 จำนวนจำกัด 50,000 โปรดอ่าน
                        <Link href={""}>
                            <span className="text-detail_red"> รายละเอียด </span>
                        </Link>
                        การสั่งซื้อเพิ่มเติม</p>
                </div>
                <div className="col-12 col-md-6">
                    <div className="d-flex justify-content-center align-items-center">
                        <p className="text-number_howto"> 2 </p>
                    </div>
                    <img className="w-100 mt-2 mb-4 pe-2" src="/assets/image/progress/image2.webp" />
                    <h5 className="text-secondary">สมัครสมาชิกและทำการ KYC</h5>
                    <p className="text-detail_progress">สมัครสมาชิกที่เว็บไซต์ Thailand Post NFT และทำการยืนยัน ตัวตนด้วยบัตรประชาชนและหมายเลขโทรศัพท์มือถือ
                        <Link href={""}>
                            <span className="text-detail_red"> คลิกที่นี่ </span>
                        </Link>
                        เพื่อสมัครสมาชิกใหม่</p>
                </div>
                <div className="col-12 col-md-6">
                    <div className="d-flex justify-content-center align-items-center">
                        <p className="text-number_howto"> 3 </p>
                    </div>
                    <img className="w-100 mt-2 mb-4 pe-2" src="/assets/image/progress/image3.webp" />
                    <h5 className="text-secondary">ซื้อแสตมป์ในกลุ่ม คริปโทแสตมป์</h5>
                    <p className="text-detail_progress">นำการ์ดแสตมป์ NFT มาขูดเพื่อรับรหัสแล้วนำมากรอก
                        <Link href={""}>
                            <span className="text-detail_red"> Redeem </span>
                        </Link>
                        เพื่อรับแสตมป์ NFT ได้เลย</p>
                </div>

            </Slider>
        </>
    );
}
export default SliderHowto