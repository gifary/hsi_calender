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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/app-landing.js', 'public/js/app-landing.js')
   .combine([
        'resources/assets/js/jquery.dataTables.js',
        'resources/assets/js/dataTables.bootstrap.min.js',
        'resources/assets/js/sweetalert.min.js',
        'resources/assets/js/jquery.priceformat.js'
        // 'resources/assets/js/dataTables.jqueryui.min.js',
        // 'resources/assets/js/moment.min.js',
        // 'resources/assets/js/bootstrap-datepicker.js',
        // 'resources/assets/js/select2.full.min.js',
        // 'resources/assets/js/sweetalert.min.js'
    ], 'public/js/all.js')
   .combine([
       'resources/assets/js/script.js',
       'resources/assets/js/sweetalert.min.js',
       'resources/assets/js/jquery.priceformat.js'
    ], 'public/js/all-landing.js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .less('node_modules/bootstrap-less/bootstrap/bootstrap.less', 'public/css/bootstrap.css')
   .less('resources/assets/less/adminlte-app.less','public/css/adminlte-app.css')
   .less('node_modules/toastr/toastr.less','public/css/toastr.css')
   .combine([
        'public/css/app.css',
        'node_modules/admin-lte/dist/css/skins/_all-skins.css',
        'public/css/adminlte-app.css',
        'node_modules/icheck/skins/square/blue.css',
        'public/css/toastr.css',
        'resources/assets/css/dataTables.bootstrap.css',
        'resources/assets/css/datepicker3.css',
        'resources/assets/css/select2.min.css',
        'resources/assets/css/sweetalert.css',
    ], 'public/css/all.css')
   .combine([
       'public/css/bootstrap.css',
       'resources/assets/css/style.css',
       'resources/assets/css/responsive.css',
       'resources/assets/css/sweetalert.css',
   ], 'public/css/all-landing.css')
   //APP RESOURCES
   .copy('resources/assets/img/*.*','public/img')
   .copy('resources/assets/images/*.*','public/images')
   //VENDOR RESOURCES
   .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
   .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
   .copy('node_modules/admin-lte/bootstrap/fonts/*.*','public/fonts/bootstrap')
   .copy('node_modules/admin-lte/dist/css/skins/*.*','public/css/skins')
   .copy('node_modules/admin-lte/dist/img','public/img')
   .copy('node_modules/admin-lte/plugins','public/plugins')
   .copy('node_modules/icheck/skins/square/blue.png','public/css')
   .copy('node_modules/icheck/skins/square/blue@2x.png','public/css');

if (mix.config.inProduction) {
  mix.version();
}