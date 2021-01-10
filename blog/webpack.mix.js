const mix = require('laravel-mix');
const config = require("./webpack.config");
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
mix.webpackConfig(config);
mix.js('resources/user/js/app.js', 'public/js')
    .sass('resources/user/sass/app.scss', 'public/css');
