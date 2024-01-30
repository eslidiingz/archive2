const { VanillaExtractPlugin } = require("@vanilla-extract/webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  reactStrictMode: true,
  webpack: (config) => {
    config.module.rules.push(
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },
      {
        test: /\.jpeg/,
        type: "asset/inline",
        parser: { dataUrlCondition: { maxSize: 15000 } },
      }
    );

    config.plugins.push(
      new VanillaExtractPlugin(),
      new MiniCssExtractPlugin({
        filename: "static/css/[contenthash].css",
        chunkFilename: "static/css/[contenthash].css",
      })
    );

    if (config.module.generator?.asset?.filename) {
      if (!config.module.generator["asset/resource"]) {
        config.module.generator["asset/resource"] =
          config.module.generator.asset;
      }
      delete config.module.generator.asset;
    }
    return config;
  },
};
