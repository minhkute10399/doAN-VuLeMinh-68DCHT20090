const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/backgroundscript.js', 'public/js/backgroundscript.js')
    .js('resources/js/preview-img.js', 'public/js/preview-img.js')
    .js('resources/js/chart.js', 'public/js/chartjs')
    .js('resources/js/preview.js', 'public/js/preview.js')
    .js('resources/js/bootstrap.js', 'public/js/bootstrap.js')
    .js('resources/js/pusher.js', 'public/js/pusher.js')
    .js('resources/js/comment.js', 'public/js/comment.js')
    .copy('node_modules/chart.js/dist/Chart.js', 'public/js');
