var elixir = require('laravel-elixir');

// Set new assets path
config.assetsPath = '';

elixir(function(mix) {
    // Compile to WordPress CSS location
    mix.sass('main.scss', '../style.css');
});