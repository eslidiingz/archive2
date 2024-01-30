/** @format */
import { serverSideTranslations } from 'next-i18next/serverSideTranslations'
import { useTranslation, Trans } from "next-i18next";
import Mainlayout from "../components/layouts/Mainlayout";
import React from "react";
import TopbarMenu from "../components/layouts/TopbarMenu";
import Information from "../components/pages/home/Information";
import Hilight from "../components/pages/home/Hilight";
import Howto from "../components/pages/home/Howto";
import Redeem from "../components/pages/home/Redeem";
import Faq from "../components/pages/home/Faq";
import Concept from "../components/pages/home/concept";
import Terms from "../components/pages/home/Terms";
import SpecialNFT from "../components/pages/home/SpecialNFT";

const App = () => {
  const { t } = useTranslation("common");

  return (
    <>
      <Hilight />
      <TopbarMenu />
      <Information />
      <SpecialNFT />
      <Howto />
      <Redeem />
      <Concept />
      <Faq />
      <Terms />
    </>
  );
};


export async function getServerSideProps(context) {
  return {
      props: {
          ...(await serverSideTranslations(context.locale, ["common", "App"])),
      },
  };
}
export default App;
App.layout = Mainlayout;
