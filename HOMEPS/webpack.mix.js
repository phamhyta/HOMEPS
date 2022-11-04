const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .css("resources/css/app.css", "public/css/")
    .sass("resources/sass/app.scss", "public/css/")
    .copy("resources/js/slider.js", "public/js/slider.js")
    .copy("resources/css/slider.css", "public/css/slider.css")
    .copy("resources/js/toastr.min.js", "public/js/toastr.min.js")
    .css("resources/css/toastr.min.css", "public/css/toastr.min.css")
    .copy("resources/js/moment.min.js", "public/js/moment.min.js")
    .copy("resources/js/jquery.cookie.min.js", "public/js/jquery.cookie.min.js")
    .css("resources/css/bill-list.css", "public/css/bill-list.css")
    .sourceMaps();
