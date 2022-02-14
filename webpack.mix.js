let mix = require('laravel-mix');

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

mix.js('src/resources/assets/js/reasons.vue.js', 'public/js').vue();

mix.copy('public/js/reasons.vue.js', '../../../public/vendor/codificar/reasons-request/reasons.vue.js');
