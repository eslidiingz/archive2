import Link from "next/link"
import React, { useState, useRef, useEffect } from 'react';
import Policypage from "../../components/pages/register/Policy";

function Policy() {

    return (
        <section className="hilight-section_register">
            <div className="container">
                <Policypage />
            </div>
        </section>
    )
}
export default Policy
