import Link from "next/link";
import { Container, Form, FormControl, Nav, Navbar, NavDropdown, Button, Dropdown, DropdownButton } from "react-bootstrap";
import { useState, useEffect } from "react";
import { useRouter } from "next/router";

function Loader() {
    return (
      <>
        <div className="lds-spinner mb-4">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </>
    )
  }
  export default Loader
  