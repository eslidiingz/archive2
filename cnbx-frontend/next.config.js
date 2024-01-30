/**
 * @format
 * @type {import('next').NextConfig}
 */
 const { i18n } = require("./next-i18next.config");

 const nextConfig = {
   reactStrictMode: true,
   env: {
     REST_API_KEY: process.env.NEXT_PUBLIC_JNFT_API_KEY,
     REST_API: process.env.NEXT_PUBLIC_JNFT_API_URL,
   },
     i18n,
 };
 
 module.exports = nextConfig;
 