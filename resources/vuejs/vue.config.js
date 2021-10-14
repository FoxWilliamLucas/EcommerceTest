module.exports = {
  transpileDependencies: ["vuetify"],
  outputDir: "../../public/vuejs",
  publicPath: process.env.NODE_ENV === "production" ? "/vuejs/" : "/",
  indexPath:
    process.env.NODE_ENV === "production"
      ? "../../resources/views/welcome.blade.php"
      : "index.html"
};
