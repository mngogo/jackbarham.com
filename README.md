# Custom WordPress theme 
- Preview [www.jackbarham.com](https://www.jackbarham.com)

### Dependencies
- Laravel Elixir for compiling assets in Gulp
- Bourbon for SASS mixins

### Setup
To get the exact same functionality you need to install [Advance Custom Fields](https://www.advancedcustomfields.com) plugin with premium add-ons: [Options Page](), [Repeater Field]() and [Flexible Content](). Then import `jackbarham-schema.sql` in to MySQL with a prefix of `wxp_`

1. [Download](https://wordpress.org/latest.zip), install and setup WordPress
2. Install [Advance Custom Fields](https://www.advancedcustomfields.com) with Pro or Add-ons plugin
3. [Download](https://github.com/jackbarham/jackbarham.com/archive/master.zip) or clone this repo into your theme directory (don't change the folder name)
4. Set table prefix to `wxp_` in `config.php`
5. Import `sql/jackbarham-schema.sql` into your MySQL database

The theme should be ready to use without any build process. 

### Build
- From the WordPress directory in terminal `cd wp-content/themes/jackbarham/src` 
- Install node packages `npm install` 
- Compile SASS to CSS `gulp` or `gulp watch`. 
- To minify run `gulp --production`. 

This theme doesn't use any Javascript, yet. Further build docs are available on the [Elixir website](https://laravel.com/docs/master/elixir).

### Note
The font used is [FF Meta Serif Pro](https://typekit.com/fonts/ff-meta-serif-web-pro) and requires a free [Adobe Typekit](https://typekit.com/plans) account. I've haven't created a fallback option so you're likely to see Times New Roman until you set your own font preferences.
