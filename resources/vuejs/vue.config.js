module.exports = {
  transpileDependencies: ["vuetify"],
  outputDir: "../../public/assets/vuejs",
  publicPath: process.env.NODE_ENV === "production" ? "/assets/vuejs/" : "/",
  indexPath:
    process.env.NODE_ENV === "production"
      ? "../../resources/views/welcome.blade.php"
      : "index.html"
};
