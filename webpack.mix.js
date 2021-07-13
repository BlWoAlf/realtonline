const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/main.scss', 'public/css/app.css')
    .js('public/vendor/mmenu-light/dist/mmenu-light.js', 'public/js/app.js')
    .postCss('public/vendor/mmenu-light/dist/mmenu-light.css', 'public/css/app.css');
