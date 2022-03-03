const mix = require('laravel-mix');
require('laravel-mix-serve');

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
    .js('resources/js/cars_form.js', 'public/js')
    .js('resources/js/car_edit.js', 'public/js')
    .js('resources/js/readonly-editor.js', 'public/js')
    .js('resources/js/reserve_car.js', 'public/js')
    .css('resources/css/home.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]).serve();
