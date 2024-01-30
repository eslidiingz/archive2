import Link from "next/link"
import React, { useState, useRef, useEffect } from 'react';
import Table from 'react-bootstrap/Table';
import { Container, Form, FormControl, Nav, Navbar, NavDropdown, Button, Dropdown, DropdownButton } from "react-bootstrap";
import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";




function Concept() {
    const router = useRouter();
    const { t } = useTranslation("common");

    const data = [
        {
            id: "0",
            title: "-",
            detail1: t("Concept.title2_1"),
            detail2: t("Concept.title3_1")
        },
        {
            id: "0",
            title: "-",
            detail1: t("Concept.title2_2"),
            detail2: t("Concept.title3_2")
        },
        {
            id: "0",
            title: "-",
            detail1: t("Concept.title2_3"),
            detail2: t("Concept.title3_3")
        },
        {
            id: "0",
            title: "-",
            detail1: t("Concept.title2_4"),
            detail2: t("Concept.title3_4")
        },
    ];

    

    return (
        <section id="ConceptStampNFT">
            <div className="container">
                <div className="row">
                    <div className="col-12 text-center mt-4">
                        <h2 className="text-primary mb-5"> {t("Concept.title1")}</h2>
                    </div>
                    <div className="col-12  table_overflow">
                        <Table className="table-conceptNFT" striped hover responsive="md" bordered>
                            <thead>
                                <tr className="tr-bd-none">
                                    {/* <th  className="tr-bl-none "></th> */}
                                    <th className="th-concept br-th" width="50%">
                                        <p className="ci-color-orange mb-2 font-sm">{t("Concept.title2")}</p>
                                        <div className="">
                                            <img  src="/assets/image/Asset1.webp" />
                                        </div>
                                    </th>
                                    <th className="th-concept br-th" width="50%">
                                        <p className="ci-color-orange mb-2 font-sm">{t("Concept.title3")}</p>
                                        <div className="">
                                            <img  src="/assets/image/nft01.webp" />
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {data.map((item) => (
                                <tr key={item.id}>
                                    {/* <td className="br-th ">
                                        <div className="p-3">
                                            <h6 className="mb-0 ci-color-blue nowrap">{item.title}</h6>
                                        </div>
                                    </td> */}
                                    <td align="center" className="br-th">
                                        {/* <div  className="p-3 d-block d-lg-none">
                                            <h6 className="mb-0 ci-color-blue">{item.title}</h6>
                                        </div> */}
                                        <div>
                                            <p className="txt-detail-gray-V2 mb-0 mt-2">{item.detail1}</p>
                                        </div>
                                    </td>
                                    <td align="center" >
                                        {/* <div  className="p-3 d-block d-lg-none">
                                            <h6 className="mb-0 ci-color-blue">{item.title}</h6>
                                        </div> */}
                                        <div>
                                            <p className="txt-detail-gray-V2 mb-0 mt-2">{item.detail2}</p>
                                        </div>
                                    </td>
                                </tr>
                                 ))}
                            </tbody>
                        </Table>
                        <p className="mt-4 text-2"><span className="me-2 text-primary text-bold">{t("Concept.title4")}</span>{t("Concept.title5")}</p>
                    </div>
                </div>
            </div>
        </section >
    )
}
export default Concept
