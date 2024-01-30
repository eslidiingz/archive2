import Link from "next/link";
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
import { useState, useEffect } from "react";
import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";

function Sidebar() {
  const { t } = useTranslation("common");
  const router = useRouter();
  return (
    <>
      <ul className="sidebar-body">
        <Link href="/account">
          <a
            className={`nav-link ${
              router.pathname == "/account" ? "active" : ""
            }`}
          >
            <li>
              <i className="icon-user"></i>{t("menu.Account")}
            </li>
          </a>
        </Link>
        <Link href="/account/inventory">
          <a
            className={`nav-link ${
              router.pathname == "/account/inventory" ? "active" : ""
            }`}
          >
            <li>
              <i className="icon-inventory"></i>{t("menu.NFT")}
            </li>
          </a>
        </Link>
      </ul>
    </>
  );
}
export default Sidebar;
