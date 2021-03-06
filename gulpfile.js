var elixir = require('laravel-elixir');

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

    mix.styles([
      '../../../node_modules/select2/dist/css/select2.min.css',
      '../../../public/css/app.css',	
  	]);

    mix.scripts([
      '../../../node_modules/jquery/dist/jquery.min.js',
      '../../../node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
      '../../../node_modules/select2/dist/js/select2.min.js',
      'app.js',
    ]);

		mix.version([
      'public/js/all.js',
      'public/css/all.css'
    ]);
});
