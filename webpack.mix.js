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
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
    mix.copyDirectory('node_modules/bootstrap','public/library/bootstrap');
    mix.copyDirectory('node_modules/font-awesome','public/library/font-awesome');
    mix.copyDirectory('node_modules/jquery','public/library/jquery');
