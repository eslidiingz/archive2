/** @format */

import Link from "next/link";
import React, { useState, useRef, useEffect } from "react";
import { Form, Button, InputGroup } from "react-bootstrap";
import { userInfo } from "../../../utils/apis/account-api";

const Succeed = () => {
	const [walletAddress, setWalletAddress] = useState("0xE40845297c6693863Ab3E10560C97AACb32cbc6C");
	const [copySuccess, setCopySuccess] = useState("");
	const inputWalletAddressRef = useRef(null);

	const copyToClipboard = (e) => {
		inputWalletAddressRef.current.select();
		document.execCommand("copy");
		e.target.focus();
		setCopySuccess("คัดลอกแล้ว");
	};

	const initialize = async () => {
		try {
			if (sessionStorage.getItem("authentication") === null) {
				return;
			}
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

			const resUserInfo = await response.json();
			// console.log(" === resUserInfo ", resUserInfo);

			setWalletAddress(resUserInfo?.data?.response?.data?.wallet.address);
			// const response = await userInfo();
			// setWalletAddress(response.data.wallet.address);
		} catch { }
	};

	useEffect(() => {
		let mounted = true;

		if (mounted) initialize();

		return () => {
			mounted = false;
		};
	}, []);

	return (
		<section className="layout_succeed-components">
			<div className="row">
				<div className="col-lg-12 text-center d-lg-block d-none">
					<img src="../../assets/image/logo.svg" className="iconlogo_reg" />
					<img src="../../assets/image/JNFT_LOGO.svg" className="iconlogo_JKNFT" />
				</div>
				<div className="col-lg-12 text-center mb-4 d-block d-lg-none">
					<img src="../../assets/image/logo.svg" className="iconlogo_reg" />
				</div>
				<div className="col-lg-12 text-center d-block d-lg-none">
					<img src="../../assets/image/JNFT_LOGO.svg" className="iconlogo_JKNFT" />
				</div>

				<div className="col-12 my-5 text-center">
					<img src="../../assets/image/icon/Succeed.svg" className="icon-copy_reg" />
					<h3 className="txt-set-detail-JNFT mt-4 mb-0">สมัครสมาชิกสำเร็จแล้ว</h3>
					<p className="text-detail_terms">ระบบได้สร้างกระเป๋า Wallet ให้คุณแล้ว</p>
				</div>
			</div>
			<div className="row d-flex justify-content-center field-group">
				<div className="col-12 col-lg-7 ">
					<Form>
						{/* <p className="field-txt mb-2">Your Wallet Address</p>
						<InputGroup className="mb-5 col-12">
							<Form.Control
								placeholder=""
								aria-describedby="basic-addon2"
								className="form-control-set-file"
								ref={inputWalletAddressRef}
								value={walletAddress}
							/>
							<Button variant="outline-secondary" id="button-addon2" className="btn-OTP" onClick={copyToClipboard}>
								<i className="far fa-copy"></i> {copySuccess ? <>{copySuccess}</> : <>คัดลอก</>}
							</Button>
						</InputGroup> */}

						<div className="row my-5">
							<div className="col-md-4 col-12 mb-md-0 mb-3">
								<Link href="/">
									<button className="btn-cancel w-100 btn">ปิดหน้านี้</button>
								</Link>
							</div>
							<div className="col-md-8 col-12">
								<Link href="/#CodeStamp">
									<button className="btn-save w-100 btn">Redeem NFT ของคุณ</button>
								</Link>
							</div>
						</div>
					</Form>
				</div>
			</div>
		</section>
	);
};

export default Succeed;
