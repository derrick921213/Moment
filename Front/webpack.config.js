const HtmlWebpackPlugin = require("html-webpack-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const path = require("path");
module.exports = {
  // 入口
  entry: "./src/index.js",
  // 模式
  mode: "production",
  // 出口
  output: {
    path: path.resolve(__dirname, "dist"),
    filename: "index.js",
  },
  performance: {
    maxEntrypointSize: 512000,
    maxAssetSize: 512000
  },
  // loader
  // 因為webpack預設只看得懂js所以專案有用到js以外的就需要裝上對應的loader來編譯
  // 每個loader都有可以設定的規則寫在rules裡
  module: {
    rules: [
      {
        test: /\.css$|\.scss$/i,
        // use: ["style-loader", "css-loader"],
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
            }
          },
          {
            loader: 'postcss-loader'
          },
          {
            loader: 'sass-loader'
          }
        ],
      },
      {
        test: /\.(png|jpe?g)$/i,
        type: 'asset/resource'
      }
    ],
  },
  // plugin
  plugins: [
    new HtmlWebpackPlugin({
      template: "./src/index.php",
      filename: 'index.php',
      removeComments: true, // 強制刪除HTML注釋

    }),
    // 將css檔案抽離出來css的樣式就不會再index.js內混入，預設沒有裝這個plugin專案的css會被寫在build出來的js內
    new MiniCssExtractPlugin({
      filename: "index.css",
    }),
    new CleanWebpackPlugin(),
  ],

  // 開啟devtool可以在瀏覽器除錯時看到最原始的程式碼而不會是預設打包好的原始碼
  devtool: 'source-map'
};