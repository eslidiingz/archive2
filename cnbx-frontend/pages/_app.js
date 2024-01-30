// import 'bootstrap/dist/css/bootstrap.min.css'
import Head from "next/head";
import "../public/assets/font-awesome/css/all.css";
// import "bootstrap/dist/css/bootstrap.min.css";
import "../public/assets/css/bootstrap.min.css";
import "../public/assets/css/style.css";
import "../public/assets/css/style01.css";
import "../public/assets/css/style02.css";
import { appWithTranslation } from 'next-i18next';
import { ApolloProvider } from "@apollo/client";
import client from "../utils/apollo/apollo-client";

function MyApp({ Component, pageProps }) {
  const Layout = Component.layout || (({ children }) => <>{children}</>);
  return (
    <>
      <Head>
        <link
          rel="icon"
          type="image/png"
          href="assets/image/LogoS.png"
          sizes="32x32"
        ></link>
        <link rel="apple-touch-icon" href="/image/LogoS.png"></link>
        <meta name="description" content="Thailandpost Stamp NFT" />
        <meta name="keywords" content="Thailandpost Stamp NFT" />
        <meta property="og:title" content="Thailandpost Stamp NFT" />
        <meta property="og:description" content="Thailandpost Stamp NFT" />
        <meta property="og:image" content="" />
        <title>Thailandpost Stamp NFT</title>
        <link
          href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai+Looped:wght@100;200;300;400;500;600;700&display=swap"
          rel="stylesheet"
        ></link>
        <link
          href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet"
        ></link>
        <link
          rel="stylesheet"
          type="text/css"
          charset="UTF-8"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"
        />
        <link
          rel="stylesheet"
          type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"
        />
      </Head>
      <Layout>
        <ApolloProvider client={client}>
          <Component {...pageProps} />
        </ApolloProvider>
      </Layout>
    </>
  );
}

export default appWithTranslation(MyApp);
