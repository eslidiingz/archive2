import Link from "next/link";
import React, { useState, useRef, useEffect } from "react";
import Approvepage from "../../components/pages/register/Approve";

function Approve() {

    return (
        <section className="hilight-section_register">
            <div className="container">
                <Approvepage />
            </div>
        </section>
    )
}
export default Approve;
