import Document, { Html, Head, Main, NextScript } from "next/document";

class MainDocument extends Document {
  static async getInitialProps(ctx) {
    const initialProps = await Document.getInitialProps(ctx);
    return { ...initialProps };
  }

  render() {
    return (
      <Html>
        <Head>
          {/* <link href="/css/bootstrap.css" rel="preload stylesheet" />
          <link href="/css/custom.css" rel="preload stylesheet" />
          <link href="/css/style.css" rel="preload stylesheet" /> */}
        </Head>
        <body>
          <Main />
          <NextScript />

          <div id="modal-root"></div>
        </body>
      </Html>
    );
  }
}

export default MainDocument;
