import Link from "next/link";
import { serverSideTranslations } from 'next-i18next/serverSideTranslations'
import { useTranslation, Trans } from "next-i18next";
import React, { useState, useRef, useEffect } from "react";
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
  InputGroup,
} from "react-bootstrap";

function Profile() {
  const { t } = useTranslation("common");
  const hiddenFileInput = React.useRef(null);
  const handleClick = (event) => {
    hiddenFileInput.current.click();
  };
  return (
    <>
      <div className="d-flex my-5">
        <div className="col-sm-12 col-lg-6">
          <h3 className="text-primary mb-0">ข้อมูลส่วนตัว</h3>
          <p className="txt-detail-gray-V2">
            จัดการข้อมูลส่วนตัวคุณเพื่อความปลอดภัยของบัญชีผู้ใช้นี้
          </p>
        </div>
        <div className="col-auto col-sm-12 ms-auto col-lg-6">
          <button className="btn-silver btn">
            อัพเกรดเป็น Silver
            <img className="mx-2" src="../../assets/image/icon/silver.svg" />
          </button>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">ชื่อผู้ใช้</div>
        <div className="col-lg-9 col-xl-6">
          <InputGroup>
            <Form.Control
              className="form-control-set"
              placeholder="Username"
              aria-label="Username"
              aria-describedby="basic-addon2"
            />
          </InputGroup>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">หมายเลขโทรศัพท์</div>
        <div className="col-lg-9 col-xl-6">
          <InputGroup>
            <Form.Control
              className="form-control-set"
              placeholder="xxx-xxx-xxxx"
              aria-label="Tell"
              aria-describedby="basic-addon2"
            />
          </InputGroup>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">รหัสผ่าน</div>
        <div className="col-lg-9 col-xl-6">
          <InputGroup>
            <Form.Control
              className="form-control-set"
              placeholder="********"
              aria-label="password"
              aria-describedby="basic-addon2"
            />
          </InputGroup>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">เลขบัตรประชาชน</div>
        <div className="col-lg-9 col-xl-6">
          <InputGroup>
            <Form.Control
              className="form-control-set"
              placeholder="xxxxx-xxxx-x-xxx"
              aria-label="password"
              aria-describedby="basic-addon2"
            />
          </InputGroup>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">
          ถ่ายรูปหน้าบัตรประชาชน{" "}
          <img src="../../assets/image/icon/help.svg" className="ms-2" />{" "}
        </div>
        <div className="col-lg-9 col-xl-6">
          <div className="input-group">
            <input
              placeholder="เลือกไฟล์"
              className=" form-control  form-control-set-file "
            />
            <Button className="btn-file-upload" onClick={handleClick}>
              {" "}
              <img className="mx-2" src="../../assets/image/icon/IDcard.svg" />
            </Button>
            <input
              type="file"
              ref={hiddenFileInput}
              style={{ display: "none" }}
            />
          </div>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">
          ถ่ายรูป Selfie{" "}
          <img src="../../assets/image/icon/help.svg" className="ms-2" />{" "}
        </div>
        <div className="col-lg-9 col-xl-6">
          <div className="input-group">
            <input
              placeholder="เลือกไฟล์"
              className=" form-control  form-control-set-file "
            />
            <Button className="btn-file-upload" onClick={handleClick}>
              {" "}
              <img className="mx-2" src="../../assets/image/icon/Selfie.svg" />
            </Button>
            <input
              type="file"
              ref={hiddenFileInput}
              style={{ display: "none" }}
            />
          </div>
        </div>
        <div className="col-lg-9 col-xl-3 offset-lg-3 offset-xl-0 mt-2 mt-xl-0 validation">
          *จำเป็นต้องกรอก เมื่ออัพเกรดเป็น Silver
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">คำนำหน้าชื่อ </div>
        <div className="col-lg-9 col-xl-6">
          <Form>
            {["radio"].map((type) => (
              <div key={`inline-${type}`}>
                <Form.Check
                  inline
                  label="นาย"
                  name="group1"
                  type={type}
                  id={`inline-${type}-1`}
                />
                <Form.Check
                  inline
                  label="นางสาว"
                  name="group1"
                  type={type}
                  id={`inline-${type}-2`}
                />
                <Form.Check
                  inline
                  label="นาง"
                  name="group1"
                  type={type}
                  id={`inline-${type}-3`}
                />
              </div>
            ))}
          </Form>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">ชื่อ-นามสกุล</div>
        <div className="col-lg-9 col-xl-6">
          <div className="row">
            <div className="col-6">
              <InputGroup>
                <Form.Control
                  className="form-control-set"
                  placeholder="ชื่อ"
                  aria-label="text"
                  aria-describedby="basic-addon2"
                />
              </InputGroup>
            </div>
            <div className="col-6">
              <InputGroup>
                <Form.Control
                  className="form-control-set"
                  placeholder="นามสกุล"
                  aria-label="text"
                  aria-describedby="basic-addon2"
                />
              </InputGroup>
            </div>
          </div>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">เพศ </div>
        <div className="col-lg-9 col-xl-6">
          <Form>
            {["radio"].map((type) => (
              <div key={`inline01-${type}`}>
                <Form.Check
                  inline
                  label="ชาย"
                  name="group1"
                  type={type}
                  id={`inline01-${type}-1`}
                />
                <Form.Check
                  inline
                  label="หญิง"
                  name="group1"
                  type={type}
                  id={`inline01-${type}-2`}
                />
              </div>
            ))}
          </Form>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">วัน เดือน ปีเกิด</div>
        <div className="col-lg-9 col-xl-6">
          <InputGroup>
            <Form.Control
              className="form-control-set"
              placeholder="xx/xx/xxxx"
              aria-label="Tell"
              aria-describedby="basic-addon2"
            />
          </InputGroup>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">สถานภาพ </div>
        <div className="col-lg-9 col-xl-6">
          <Form>
            {["radio"].map((type) => (
              <div key={`inline02-${type}`}>
                <Form.Check
                  inline
                  label="โสด"
                  name="group1"
                  type={type}
                  id={`inline02-${type}-1`}
                />
                <Form.Check
                  inline
                  label="แต่งงาน"
                  name="group1"
                  type={type}
                  id={`inline02-${type}-2`}
                />
                <Form.Check
                  inline
                  label="หย่า"
                  name="group1"
                  type={type}
                  id={`inline02-${type}-3`}
                />
              </div>
            ))}
          </Form>
        </div>
      </div>
      <div className="row field-group">
        <div className="col-lg-3 field-name">สัญชาติ</div>
        <div className="col-lg-9 col-xl-6">
          <InputGroup>
            <Form.Control
              className="form-control-set"
              placeholder="สัญชาติ"
              aria-label="Tell"
              aria-describedby="basic-addon2"
            />
          </InputGroup>
        </div>
      </div>
      <div className="row">
        <div className="col-lg-3 field-name"></div>
        <div className="col-lg-9 col-xl-6">
          <button className="btn btn-save">บันทึก</button>
        </div>
      </div>
    </>
  );
}

export async function getServerSideProps(context) {
  return {
      props: {
          ...(await serverSideTranslations(context.locale, ["common", "Profile"])),
      },
  };
}
export default Profile;
Profile.layout = Mainlayout;
