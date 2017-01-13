const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    var bpath = '../../../node_modules/';
    var assets = '../../../resources/assets/';

    mix.styles([
        bpath + 'bootstrap/dist/css/bootstrap.min.css',
        bpath + 'font-awesome/css/font-awesome.css'
    ], 'public/css/app.css');

    mix.copy( 'node_modules/font-awesome/fonts', 'public/fonts' );

    mix.scripts([
        bpath + 'jquery/dist/jquery.min.js',
        bpath + 'bootstrap/dist/js/bootstrap.min.js'
    ], 'public/js/app.js');

});
