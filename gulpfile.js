var elixir = require('laravel-elixir');
require('laravel-elixir-uncss');
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
    mix.sass('app.scss');
    mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/js/bootstrap.min.js');
    mix.uncss('./public/css/app.css', {
        html: 'index.html'
    });
});
