import '../styles/globals.css'
import 'tailwindcss/tailwind.css';
import { MetaMaskProvider } from 'metamask-react';

function MyApp({ Component, pageProps }) {
  return (
    <MetaMaskProvider>
      <Component {...pageProps} />
    </MetaMaskProvider>
  );
}

export default MyApp
