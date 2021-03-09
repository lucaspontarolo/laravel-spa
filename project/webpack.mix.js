const mix = require("laravel-mix");

mix.webpackConfig(webpack => {
  return {
    resolve: {
      alias: {
        "@": __dirname + "/resources/assets/js"
      }
    }
  };
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Copy images 'resources/' to 'public/'
mix.copyDirectory("resources/assets/img", "public/assets/img");

mix
  .js("resources/assets/js/app.js", "public/assets/js")
  .vue(2)
  .sass("resources/assets/sass/app.scss", "public/assets/css")
  .options({ processCssUrls: false })
  .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/fonts');

// Third party libraries in vendor.js
mix.extract([
  "vue",
  "axios",
  "jquery",
  "bootstrap",
  "jquery.nicescroll"
]);
