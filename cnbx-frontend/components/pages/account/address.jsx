import Link from "next/link";
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
import Tab from "react-bootstrap/Tab";
import Tabs from "react-bootstrap/Tabs";

function Address() {
  return (
    <>
      <div className=" my-5">
        <div className="col ">
          <h3 className="text-primary mb-0">ที่อยู่</h3>
        </div>
      </div>
      <div>
        <Tabs
          defaultActiveKey="address"
          id="uncontrolled-tab-example"
          className="mb-3 address"
        >
          <Tab eventKey="address" title="ที่อยู่ปัจจุบัน">
            <div className="my-5">
              <div className="row field-group">
                <div className="col-lg-3 field-name">ที่อยู่</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ที่อยู่"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">ตำบล/แขวง</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ตำบล/แขวง"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">อำเภอ/เขต</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="อำเภอ/เขต"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">จังหวัด</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                       className="form-control-set"
                      placeholder="จังหวัด"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">รหัสไปรษณีย์</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="รหัสไปรษณีย์"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">ประเทศ</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ประเทศ"
                      aria-label="text"
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
            </div>
          </Tab>
          <Tab eventKey="idcard" title="ที่อยู่ตามบัตรประชาชน">
            <div className="my-5">
              <div className="row field-group">
                <div className="col-lg-3 field-name">ที่อยู่</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ที่อยู่"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">ตำบล/แขวง</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ตำบล/แขวง"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">อำเภอ/เขต</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="อำเภอ/เขต"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">จังหวัด</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="จังหวัด"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">รหัสไปรษณีย์</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="รหัสไปรษณีย์"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">ประเทศ</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ประเทศ"
                      aria-label="text"
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
            </div>
          </Tab>
          <Tab eventKey="house" title="ที่อยู่ตามทะเบียนบ้าน">
            <div className="my-5">
              <div className="row field-group">
                <div className="col-lg-3 field-name">ที่อยู่</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ที่อยู่"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">ตำบล/แขวง</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ตำบล/แขวง"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">อำเภอ/เขต</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="อำเภอ/เขต"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">จังหวัด</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="จังหวัด"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">รหัสไปรษณีย์</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="รหัสไปรษณีย์"
                      aria-label="text"
                      aria-describedby="basic-addon2"
                    />
                  </InputGroup>
                </div>
              </div>
              <div className="row field-group">
                <div className="col-lg-3 field-name">ประเทศ</div>
                <div className="col-lg-9 col-xl-6">
                  <InputGroup>
                    <Form.Control
                      className="form-control-set"
                      placeholder="ประเทศ"
                      aria-label="text"
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
            </div>
          </Tab>
        </Tabs>
      </div>
    </>
  );
}
export default Address;
