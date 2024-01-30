import { Button, Form, InputGroup } from "react-bootstrap";
import Link from "next/link";
import React, { useState, useRef, useEffect } from "react";
import { useCallback } from "react";
import { useTranslation, Trans } from "next-i18next";
import { useRouter } from "next/router";


const HeaderAccountInformation = ({

  
  headerText = "",
  classText = "",
  upgradeToClassText = "",
}) => {
  const [walletaddress, setwalletaddress] = useState("");
  const [copySuccess, setCopySuccess] = useState("");
  const textAreaRef = useRef(null);

  function copyToClipboard(e) {
    textAreaRef.current.select();
    document.execCommand("copy");
    // This is just personal preference.
    // I prefer to not show the the whole text area selected.
    e.target.focus();
    setCopySuccess("คัดลอกแล้ว");
  }

  const fetchUserAccept = useCallback(async () => {
    try {
      const { access_token } = JSON.parse(
        sessionStorage.getItem("authentication")
      );

      const response = await fetch("/api/user_info", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ access_token }),
      });

      const data = await response.json();
      setwalletaddress(data?.data?.response?.data?.wallet?.address);
    } catch (error) {
      console.log(error);
    }
  }, []);

  useEffect(() => {
    fetchUserAccept();
  }, [fetchUserAccept]);
  const router = useRouter();
  const { t } = useTranslation("common");

  return (
    <div className="row">
      <div className="col-lg-4">
        <h2 className="text-primary">{headerText}</h2>
      </div>
      <div className="col-lg-4 my-lg-0 my-2">
        <div className="dashboard-box dashboard-wallet h-100">
          <h4>{t("Profile.title13")}</h4>
          <InputGroup className="mt-5">
            <Form.Control
              aria-label="Example text with button addon"
              aria-describedby="basic-addon1"
              ref={textAreaRef}
              value={walletaddress}
            />
            <Button
              variant="wallet-copy"
              id="button-addon1"
              onClick={copyToClipboard}
            ></Button>
          </InputGroup>
        </div>
      </div>
      <div className="col-lg-4 my-lg-0 my-2">
        <Link href={`${process.env.NEXT_PUBLIC_JNFT_URL_FULL}`}>
          <a target="_blank">
            <div className="dashboard-box h-100">
              <h4 className="text-white">{t("Profile.title14")}</h4>
              <div className="d-flex justify-content-end text-end">
                <div className="mx-2">
                  {/* <p className="mt-4 txt-head-box">{classText}</p> */}
                  <img src="/assets/image/JNFT.webp" className="mt-4" />
                  {/* <p className="txt-detail-gray-V2 mb-0">อัพเกรดเป็น {upgradeToClassText}</p> */}
                </div>
              </div>
            </div>
          </a>
        </Link>
      </div>
    </div>
  );
};

export default HeaderAccountInformation;
