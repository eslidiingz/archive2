/** @format */
import { useRouter } from "next/router";
import { serverSideTranslations } from 'next-i18next/serverSideTranslations'
import { useTranslation, Trans } from "next-i18next";
import AccountLayout from "../../components/layouts/AccountLayout";
import React, { useEffect, useState, useCallback } from "react";
import { Form, Button, InputGroup } from "react-bootstrap";
import HeaderAccountInformation from "../../components/pages/account/headerAccountInformation";
import { updateAccount } from "../../utils/apis/account-api";
import Router from "next/router";
import Swal from "sweetalert2";
import DatePicker from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";

const Account = () => {
  const { t } = useTranslation("common");

  const [dateOfBirth, setDateOfBirth] = useState(new Date());
  const handleChangeDateOfBirth = async (date) => {
    setDateOfBirth(date);

    let y = date.getFullYear();
    let m = ("0" + (date.getMonth() + 1).toString()).slice(-2);
    let d = ("0" + date.getDate().toString()).slice(-2);
    let dateString = y + "-" + m + "-" + d;

    let profile = { ...userDetail.profile };
    profile.date_of_birth = dateString;

    setUserDetail((prevState) => ({
      ...prevState,
      profile: profile,
    }));
  };

  const [userDetail, setUserDetail] = useState(null);
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
      setUserDetail(data?.data?.response?.data);

      var dateOfBirthTimeStamp = Date.parse(
        data?.data?.response?.data?.profile?.date_of_birth
      );
      var dateOfBirthObject = new Date(dateOfBirthTimeStamp);
      setDateOfBirth(dateOfBirthObject);
    } catch (error) {
      console.log(error);
    }
  }, []);

  const handleChangeAccountDetail = async (e, key) => {
    try {
      setUserDetail((prevState) => {
        const tempUserDetail = { ...prevState };
        tempUserDetail.profile[key] = e.target.value;
        return tempUserDetail;
      });
    } catch {}
  };

  const handleUpdateAccount = async () => {
    try {
      let authentication = JSON.parse(
        window.sessionStorage.getItem("authentication"),
        1
      );

      const updateData = {
        access_token: authentication.access_token,
        name: userDetail?.profile?.name,
        lastname: userDetail?.profile?.lastname,
        citizen_number: userDetail?.profile?.citizen_number,
        date_of_birth: userDetail?.profile?.date_of_birth,
      };

      // const response = await updateAccount(updateData);

      let response = await fetch("/api/update_account", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(updateData),
      });

      if (response.status) {
        Swal.fire("", "แก้ไขข้อมูลเสร็จสมบูรณ์", "success");
      }
    } catch {
      Swal.fire("", "แก้ไขข้อมูลไม่สำเร็จ กรุณาลองใหม่อีกครั้ง", "warning");
    }
  };

  useEffect(() => {
    fetchUserAccept();
  }, [fetchUserAccept]);

  return (
    <>
      <HeaderAccountInformation
        headerText= {t("menu.Account")}
        classText="JNFT"
        upgradeToClassText="Silver"
      />
      <hr />
      <div className="col-12 col-lg-7 ">
        <Form>
          <Form.Group className="mb-3 col-12" controlId="formBasicEmail">
            <Form.Label className="field-txt">
            {t("Profile.title4")} <span className="text-danger mx-2">*</span>
            </Form.Label>
            <Form.Control
              value={userDetail?.profile?.name}
              type="email"
              placeholder={t("Profile.title5")}
              className="form-control-set"
              onChange={(e) => handleChangeAccountDetail(e, "name")}
            />
          </Form.Group>
          <Form.Group className="mb-3 col-12" controlId="formBasicEmail">
            <Form.Label className="field-txt">
            {t("Profile.title6")} <span className="text-danger mx-2">*</span>
            </Form.Label>
            <Form.Control
              value={userDetail?.profile?.lastname}
              type="text"
              name="lastname"
              placeholder={t("Profile.title7")}
              className="form-control-set"
              onChange={(e) => handleChangeAccountDetail(e, "lastname")}
            />
          </Form.Group>
          <Form.Group className="mb-3 col-12" controlId="formBasicEmail">
            <Form.Label className="field-txt">
            {t("Profile.title8")} <span className="text-danger mx-2">*</span>
            </Form.Label>
            <Form.Control
              value={userDetail?.profile?.citizen_number}
              type="text"
              placeholder="x-xxxx-xxxxx-xx-x"
              autocomplete="email"
              className="form-control-set"
              maxLength={13}
              onChange={(e) => handleChangeAccountDetail(e, "citizen_number")}
            />
          </Form.Group>
          <Form.Group className="mb-2 col-12" controlId="formBasicEmail">
            <Form.Label className="field-txt">
            {t("Profile.title9")}<span className="text-danger mx-2">*</span>
            </Form.Label>
            <DatePicker
              className="form-control"
              dateFormat="dd/MM/yyyy"
              selected={dateOfBirth}
              onChange={(date) => handleChangeDateOfBirth(date)}
              placeholderText="dd/mm/yyyy"
            />
            {/* <Form.Control
							value={userDetail?.profile?.date_of_birth}
							type="date"
							name="bday"
							placeholder="วว/ดด/ปป"
							className="form-control-set"
							onChange={(e) => handleChangeAccountDetail(e, "date_of_birth")}
						/> */}
          </Form.Group>
          {/* <p className="field-txt mb-2">
						เบอร์มือถือ <span className="text-danger mx-2">*</span>
					</p> */}
          {/* <InputGroup className="mb-2 col-12">
						<Form.Control
							value={userDetail?.phone_number}
							placeholder="xxx-xxx-xxxx"
							type="tel"
							name="Phone"
							className="form-control-set-file"
							disabled={true}
							onChange={(e) => handleChangeAccountDetail(e, "phone_number")}
						/>
						<Button variant="outline-secondary" id="button-addon2" className="btn-OTP" disabled={true}>
							ขอ OTP
						</Button>
					</InputGroup> */}
          <Form.Group className="mb-2 col-12" controlId="formBasicEmail">
            <Form.Label className="field-txt">{t("Profile.title12")}</Form.Label>
            <Form.Control
              type="text"
              placeholder="xxxxxx"
              className="form-control-set"
              disabled={true}
              value={userDetail?.phone_number}
            />
          </Form.Group>
          {/* <Form.Group className="mb-2 col-12" controlId="formBasicEmail">
						<Form.Label className="field-txt">
							รหัส OTP <span className="text-danger mx-2">*</span>
						</Form.Label>
						<Form.Control type="text" placeholder="xxxxxx" className="form-control-set" />
					</Form.Group> */}
          <Button
            variant="secondary"
            className="mt-4 me-3"
            onClick={() => Router.reload()}
          >
            {t("Profile.title10")}
          </Button>
          <Button
            variant="primary"
            className="mt-4"
            onClick={handleUpdateAccount}
          >
            {t("Profile.title11")}
          </Button>
        </Form>
      </div>
    </>
  );
};


export async function getServerSideProps(context) {
  return {
      props: {
          ...(await serverSideTranslations(context.locale, ["common", "Account"])),
      },
  };
}
export default Account;
Account.layout = AccountLayout;
