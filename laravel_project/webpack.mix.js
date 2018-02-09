let mix = require('laravel-mix');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

mix
	.js('resources/assets/js/welcome.js', 'public/js')
	.sass('resources/assets/sass/welcome.scss', 'public/css')
	//.js('resources/assets/js/fontawesome-5-demo', 'public/js')
	//.sass('resources/assets/sass/fontawesome-5.scss', 'public/css')
	.js('resources/assets/js/learnvue.js', 'public/js')
	// .js('resources/assets/js/learn-es2015.js', 'public/js')
	.js('resources/assets/js/app.js', 'public/js')
   	.sass('resources/assets/sass/app.scss', 'public/css');
;

mix.autoload({
	jquery: ['$', 'global.jQuery', 'jQuery', 'global.$', 'jquery', 'global.jquery']
});

//mix.copyDirectory('resources/assets/vendors', 'public/vendors');

mix.webpackConfig({
	plugins: [
	new BrowserSyncPlugin({
		files: [
			'app/**/*',
			'public/**/*',
			'resources/views/**/*',
			'resources/assets/**/*',
			'routes/**/*'
		]
	})]
});
