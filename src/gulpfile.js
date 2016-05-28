var elixir = require('laravel-elixir');

config.assetsPath = '';

elixir(function(mix) {
    mix.sass('main.scss', '../style.css');
});