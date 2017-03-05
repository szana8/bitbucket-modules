const { mix } = require('laravel-mix');

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

var node_modules = 'node_modules/';

/**
 * Mix the vendor css files to one.
 */
mix.styles([
    node_modules + 'bootstrap/dist/css/bootstrap.min.css',
    node_modules + 'font-awesome/css/font-awesome.css',
    node_modules + 'toastr/build/toastr.css'
], 'public/css/vendor.css');

mix.less('resources/assets/less/global.less', 'public/css/app.css');

/**
 * Copy the font awsome to the public folder to access it.
 */
mix.copy( 'node_modules/font-awesome/fonts', 'public/fonts' );

/**
 * Copy the font bootstrap to the public folder to access it.
 */
mix.copy( 'node_modules/bootstrap/fonts', 'public/fonts' );

/**
 * Copy all of the css files, not mix these because
 * we don't need all of the files in every module.
 */
mix.copy('resources/assets/css/login.css', 'public/css' );

/**
 * Vue components
 */
mix.js('resources/assets/js/app.js', 'public/js/app.js');
