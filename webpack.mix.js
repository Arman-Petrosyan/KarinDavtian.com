const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/home.js', 'public/js')
   .js('resources/js/contact.js', 'public/js')
   .js('resources/js/terms.js', 'public/js')
   .js('resources/js/jewellery_view.js', 'public/js')
   .js('resources/js/collage_view.js', 'public/js')
   .js('resources/js/swiper.min.js', 'public/js')
   .js('resources/js/fontawesome.min.js', 'public/js')
   .js('resources/js/admin/functions.js', 'public/js/admin')
   .js('resources/js/admin/jewellery.js', 'public/js/admin')
   .js('resources/js/admin/collage.js', 'public/js/admin')
   .js('resources/js/admin/jewellery_types.js', 'public/js/admin')

// mix.sass('resources/sass/app.scss', 'public/css/app.css')

mix.styles('resources/css/app.css', 'public/css/app.css')
   .styles('resources/css/home.css', 'public/css/home.css')
   .styles('resources/css/product.css', 'public/css/product.css')
   .styles('resources/css/about.css', 'public/css/about.css')
   .styles('resources/css/contact.css', 'public/css/contact.css')
   .styles('resources/css/collages.css', 'public/css/collages.css')
   .styles('resources/css/collage_view.css', 'public/css/collage_view.css')
   .styles('resources/css/jewelleries.css', 'public/css/jewelleries.css')
   .styles('resources/css/jewellery_view.css', 'public/css/jewellery_view.css')
   .styles('resources/css/terms.css', 'public/css/terms.css')
   .styles('resources/css/swiper.min.css', 'public/css/swiper.min.css')
   .styles('resources/css/fontawesome.min.css', 'public/css/fontawesome.min.css')
