import "../styles/globals.css";
import "../styles/admin.css";
import "../styles/admin-dark.css";

import Config from "/configs/config";

import Head from "next/head";

function MyApp({ Component, pageProps }) {
	const Layout = Component.layout || (({ children }) => <>{children}</>);

	return (
		<>
			<Head>
				<title>CNBX</title>

				<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
			</Head>

			<Layout>
				<Component {...pageProps} />
			</Layout>
		</>
	);
}

export default MyApp;
