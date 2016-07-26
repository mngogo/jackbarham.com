### Custom WordPress theme for [www.jackbarham.com](https://www.jackbarham.com)

### Dependencies
- Laravel Elixir for compiling assets in Gulp
- Bourbon for SASS mixins

### Setup
To get the exact same functionality you need to install [Advance Custom Fields](https://www.advancedcustomfields.com) plugin with premium add-ons: [Options Page](), [Repeater Field]() and [Flexible Content](). Then import `jackbarham-schema.sql` SQL schema which requires a database prefix of `wxp_`

1. Download, install and setup WordPress
2. Install [Advance Custom Fields Pro](https://www.advancedcustomfields.com) plugin
3. Download or clone this theme into the theme directory (don't change the folder name)
4. Set table prefix to `wxp_` in `config.php`
5. Import `sql/jackbarham-schema.sql` into your MySQL database

Build
Once setup the theme should be ready to use. 
To compile `.scss` in terminal `cd src` run `npm install` then `gulp` or `gulp watch`. To minify run `gulp --production`. This theme doesn't use any Javascript, yet. All docs are available on the [Elixir website](https://laravel.com/docs/master/elixir).
