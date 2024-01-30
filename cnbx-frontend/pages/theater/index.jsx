import React, { useEffect, useState } from "react";
import theater from "/models/theater"

export default function Home() {

	const handleAddNote = async () => {
	};

	const init = async () => {
		let res = await theater.gets()
		console.log("res", res)
	};

	useEffect(() => {
		init();
	}, []);

	return (
		<div>
			<img src={`/assets/image/CNBx-Logo.svg`} />
			<div>aaa</div>
		</div>
	);
}
