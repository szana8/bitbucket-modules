const elixir = require('laravel-elixir');


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

    /**
     * Mix the vendor css files to one.
     */
    mix.styles([
        bpath + 'bootstrap/dist/css/bootstrap.min.css',
        bpath + 'font-awesome/css/font-awesome.css'
    ], 'public/css/vendor.css');

    /**
     * Copy the font awsome to the public folder to access it.
     */
    mix.copy( 'node_modules/font-awesome/fonts', 'public/fonts' );

    /**
     * Copy all of the css files, not mix these because
     * we don't need all of the files in every module.
     */
    mix.copy('resources/assets/laravel-issue-tracker/css/', 'public/laravel-issue-tracker/css' );

    /**
     * Vendor javascript files, we have to mix these files
     */
    mix.scripts([
        bpath + 'jquery/dist/jquery.min.js',
        bpath + 'bootstrap/dist/js/bootstrap.min.js',
    ], 'public/js/vendor.js');

    /**
     * Core javascrpit files
     */
    mix.browserify(assets + 'js/app.js', 'public/js/app.js');

    /**
     * Bundle modules javascript files, we don't need to mix these files,
     * because we don't want to use all javascript files in every module.
     */
    mix.copy('resources/assets/laravel-issue-tracker/js/', 'public/laravel-issue-tracker/js');
});
