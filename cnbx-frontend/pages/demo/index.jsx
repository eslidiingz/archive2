/** @format */

import Demolayout from "../../components/layouts/Demolayout";
import React from "react";
import TopbarMenudemo from "../../components/layouts/TopbarMenudemo";
import Informationdemo from "../../components/pages/home/Informationdemo";
import Howto from "../../components/pages/home/Howto";
import Redeemdemo from "../../components/pages/home/Redeemdemo";
import Faq from "../../components/pages/home/Faq";
import Concept from "../../components/pages/home/concept";
import Terms from "../../components/pages/home/Terms";
import SpecialNFT from "../../components/pages/home/SpecialNFT";
import Hilightdemo from "../../components/pages/home/Hilightdemo";


const Demo = () => {
	// const [showRegisterModal, setShowRegisterModal] = useState(false);
	// const handleOpenRegisterModal = () => {
	//   setShowRegisterModal(true);
	// };
	// const handleCloseRegisterModal = () => {
	//   setShowRegisterModal(false);
	// };

	return (
		<>
			<Hilightdemo />
			<TopbarMenudemo />
			<Informationdemo />
			<SpecialNFT />
			<Howto />
			<Redeemdemo />
			<Concept />
			<Faq />
			<Terms />
		</>
	);
};

export default Demo;
Demo.layout = Demolayout;
