let mix = require('laravel-mix');

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

mix
	.js('resources/assets/js/welcome.js', 'public/js')
	.sass('resources/assets/sass/welcome.scss', 'public/css')
	.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/learnvue.js', 'public/js')
	.js('resources/assets/js/learn-es2015.js', 'public/js')
   	.sass('resources/assets/sass/app.scss', 'public/css');


mix.autoload({
	jquery: ['$', 'global.jQuery', 'jQuery', 'global.$', 'jquery', 'global.jquery']
});

const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

mix.webpackConfig({
	plugins: [
	new BrowserSyncPlugin({
		files: [
			'app/**/*',
			'public/**/*',
			'resources/views/**/*',
			'routes/**/*'
		]
	})]
});
