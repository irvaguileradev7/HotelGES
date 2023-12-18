const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .css('resources/css/app.css', 'public/css', [

   ])
   .browserSync({
       proxy: 'http://127.0.0.1:8000/', // Reemplace 'yourapp.test' con la URL de su aplicación Laravel
       notify: false,
   });
