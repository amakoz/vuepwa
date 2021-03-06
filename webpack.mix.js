let mix = require('laravel-mix');
let purgeCss = require('purgecss-webpack-plugin');
let glob = require('glob-all');
let tailwindcss = require('tailwindcss');
let SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new SWPrecacheWebpackPlugin({
            cacheId: 'pwa',
            filename: 'service-worker.js',
            staticFileGlobs: ['public_html/**/*.{css,eot,svg,ttf,woff,woff2,js,html}'],
            minify: true,
            stripPrefix: 'public_html/',
            handleFetch: true,
            dynamicUrlToDependencies: { //you should add the path to your blade files here so they can be cached
                //and have full support for offline first (example below)
                '/': ['resources/views/welcome.blade.php'],
                // '/posts': ['resources/views/posts.blade.php']
            },
            staticFileGlobsIgnorePatterns: [/\.map$/, /mix-manifest\.json$/, /manifest\.json$/, /service-worker\.js$/],
            navigateFallback: '/',
            runtimeCaching: [
                {
                    urlPattern: /^https:\/\/fonts\.googleapis\.com\//,
                    handler: 'cacheFirst'
                },
                {
                    urlPattern: /^https:\/\/www\.thecocktaildb\.com\/images\/media\/drink\/(\w+)\.jpg/,
                    handler: 'cacheFirst'
                }
            ],
            // importScripts: ['./js/push_message.js']
        })
    ]
});

mix.js('resources/assets/js/app.js', 'public_html/js')
	.version()
	.setPublicPath('public_html');


mix.sass('resources/assets/sass/app.scss', 'public_html/css')
	.options({
		processCssUrls: false,
		postCss: [tailwindcss('./tailwind.js')],
	});

mix.webpackConfig({
	output: {
		path: path.resolve(__dirname, 'public_html')
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['env']
					}
				}
			}
		]
	}
});

mix.browserSync({
	proxy: 'vue.test',
	files: ['resources/views/**/*.*', 'resources/assets/**/*.*'],
	notify: false,
});

mix.disableSuccessNotifications();