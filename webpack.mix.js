const mix = require('laravel-mix');
require('laravel-vue-i18n/mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.i18n();
mix.js('resources/js/app.js', 'public/js').vue()
    .i18n()
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ])
    .alias({
        '@': 'resources/js',
    });

if (mix.inProduction()) {
    mix.version();
}
