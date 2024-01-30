import Link from "next/link";
import { useRouter } from "next/router";
import { serverSideTranslations } from 'next-i18next/serverSideTranslations'
import { useTranslation, Trans } from "next-i18next";
import AccountLayout from "../../components/layouts/AccountLayout";
import React from "react";
import Pagination from "react-bootstrap/Pagination";
import SliderCard from "../../components/slider/SliderCard";
import StampCardContainer from "../../components/pages/account/stampCardContainer";
import { useEffect } from "react";
import { gql, useLazyQuery, useQuery } from "@apollo/client";
import { useState } from "react";
import client from "../../utils/apollo/apollo-client";
import { hexlify, hexZeroPad } from "@ethersproject/bytes";
import { Form, Button, InputGroup } from "react-bootstrap";

const QUERY = gql`
  query GetTokenByUserId($wallet: ID!, $collection: ID!) {
    tokens(where: { collection: $collection, owners_: { owner_contains: $wallet } }) {
      id
      creator {
        id
      }
      createdDate
    }
  }
`;

const Account = () => {
  const { t } = useTranslation("common");
  const [walletAddress, setWalletAddress] = useState();
  const [inventoryList, setInventoryList] = useState([]);

  const fetchAccountWallet = async () => {
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

      const data = await response.json();
      const wallet = data?.data?.response?.data?.wallet?.address;

      const _wallet = wallet.toLowerCase();

      setWalletAddress(_wallet);
    } catch (error) {
      console.log(error);
    }
  };

  const fetchInventoryStamp = async (wallet) => {
    const { data, loading } = await client.query({
      query: QUERY,
      variables: {
        wallet: wallet.toLowerCase(),
        collection: process.env.NEXT_PUBLIC_NFT_COLLECTION_ID,
      },
    });

    const list = data?.tokens.map((_list) => {
      const tokenHex = hexZeroPad(hexlify(parseInt(_list.id)), 32).substring(2);
      return { tokenHex, tokenId: _list.id };
    });

    setInventoryList(list);
  };

  useEffect(() => {
    fetchAccountWallet();
    if (walletAddress) {
      fetchInventoryStamp(walletAddress);
    }
  }, [walletAddress]);
  // const cards = [
  //   {
  //     hashtag: "#001",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image8.webp",
  //   },
  //   {
  //     hashtag: "#002",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image10.webp",
  //   },
  //   {
  //     hashtag: "#003",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image12.webp",
  //   },
  //   {
  //     hashtag: "#004",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image8.webp",
  //   },
  //   {
  //     hashtag: "#001",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image8.webp",
  //   },
  //   {
  //     hashtag: "#002",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image10.webp",
  //   },
  //   {
  //     hashtag: "#003",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image12.webp",
  //   },
  //   {
  //     hashtag: "#004",
  //     collection: "Collection",
  //     title: "1st NFT STAMP IN ASEAN",
  //     detail:
  //       " ฉลองก้าวสู่ปีที่ 140 ของกิจการไปรษณีย์ ที่รับใช้เคียงคู่คนไทยมาอย่างยาวนาน",
  //     image: "../../assets/image/stamp/image8.webp",
  //   },
  // ];

  return (
    <>
      <div className="row">
        <div className="col-12">
          <h2 className="text-primary">{t("Profile.title15")}</h2>
        </div>
        <div className="col-12">
          <div className="row line-bottom-inventory">
            <div className="col-auto d-flex align-items-end">
              <p className="mb-0 txt-tab-NFT">{t("menu.NFT")}</p>
            </div>
            <div className="col d-flex justify-content-end mb-2">
              <Link href={`${process.env.NEXT_PUBLIC_JNFT_URL_FULL}`}>
                <Button variant="primary" size="sm" className="min-w-unset">
                {t("Profile.title16")}
                </Button>
              </Link>
            </div>
          </div>
        </div>
      </div>

      <StampCardContainer cards={inventoryList} />

      {/* <section className="d-lg-none d-block">
        <div className="row ">
          <SliderCard cards={cards} />
        </div>
      </section> */}

      {/* <section>
        <div className="row">
          <div className="col-12 col-xl-6 d-flex justify-content-center justify-content-xl-start mb-xl-0 mb-4">
            <p className="mx-2 txt-detail-gray">Showing</p>
            <Form.Select aria-label="Default select example" className="select">
              <option>8</option>
              <option value="1">7</option>
              <option value="2">6</option>
              <option value="3">5</option>
            </Form.Select>
            <p className="mx-2 txt-detail-gray">assets per page</p>
          </div>
          <div className="col-12 col-xl-6 d-flex justify-content-xl-end justify-content-center">
            <Pagination size="sm">
              <Pagination.Prev />
              <Pagination.Item>{1}</Pagination.Item>
              <Pagination.Ellipsis />
              <Pagination.Item>{10}</Pagination.Item>
              <Pagination.Item>{11}</Pagination.Item>
              <Pagination.Item active>{12}</Pagination.Item>
              <Pagination.Ellipsis />
              <Pagination.Item>{20}</Pagination.Item>
              <Pagination.Next />
            </Pagination>
          </div>
        </div>
      </section> */}
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
