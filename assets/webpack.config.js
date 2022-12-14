const path = require("path");

const JS_DIR = path.resolve(__dirname, "js/");
const IMG_DIR = path.resolve(__dirname, "images/");
const BUILD_DIR = path.resolve(__dirname, "build");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const DependencyExtractionWebpackPlugin = require("@wordpress/dependency-extraction-webpack-plugin");
const Uglify = require("uglifyjs-webpack-plugin");

const entry = {
  index: JS_DIR + "/index.js",
  single: JS_DIR + "/single.js",
  editor: JS_DIR + "/editor.js",
  block: JS_DIR + "/block.js",
  author: JS_DIR + "/author.js",
};
const output = {
  path: BUILD_DIR,
  filename: "js/[name].js",
};
const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
  {
    test: /\.scss$/,
    exclude: /node_modules/,
    use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: [
      {
        loader: "file-loader",
        options: {
          name: "[path][name].[ext]",
          publicPath: "production" === process.env.NODE._ENV ? "../" : "../../",
        },
      },
    ],
  },
];

const plugins = (argv) => [
  new CleanWebpackPlugin({
    cleanStaleWebpackAssets: argv.mode === "production",
  }),

  new MiniCssExtractPlugin({
    filename: "css/[name].css",
  }),

  new DependencyExtractionWebpackPlugin({
    injectPolyfill: true,
    combineAssets: true,
  }),
];

module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  devtool: "source-map",
  module: {
    rules: rules,
  },
  optimization: {
    minimizer: [
      new CssMinimizerPlugin(),
      new Uglify({
        cache: false,
        parallel: true,
        sourceMap: false,
      }),
    ],
  },
  plugins: plugins(argv),
  externals: {
    jquery: "jquery",
  },
});
