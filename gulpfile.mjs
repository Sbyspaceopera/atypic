import gulpPkg from 'gulp';

import dartSass from 'sass';
import gulpSass from 'gulp-sass';

import imagemin from 'gulp-imagemin';

import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';
import cssnano from 'cssnano';

import rename from 'gulp-rename';

import browserSyncObject from 'browser-sync';

import compiler from "webpack"
import webpack from "webpack-stream"
import webpackConfig from './atypic.webpack.config.js'

const {watch, dest, src, series} = gulpPkg
const browserSync = browserSyncObject.create();

function js() {
	return src('js/index.js')
		//Compiler is needed to allow gulp to watch files
		//See webpack-stream docs
		.pipe(webpack(webpackConfig, compiler))
		.pipe(dest('./js/build/'));
}

function css() {
	const sass = gulpSass(dartSass);
	const pluginsPostCSS = [autoprefixer, cssnano] 

	return src(['scss/*.scss', 'style.css'], {sourcemaps:true})
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss(pluginsPostCSS))
		.pipe(rename((path) => path.extname = '.min.css'))
		.pipe(dest('./scss/build/', {sourcemaps:true}))
		.pipe(browserSync.stream());
}

function img() {
	return src('images/*').pipe(imagemin()).pipe(dest('./images/build'));
}

function watchFiles() {
	

	browserSync.init({
		proxy: 'testing.local',
	});

	watch(['js/*.js','js/web-components/*.js'], { ignoreInitial: false }, js).on('ready', browserSync.reload);
	watch(['scss/*.scss', 'style.css'], { ignoreInitial: false }, css).on('ready', browserSync.reload);
	watch('images/*', { ignoreInitial: false }, img).on('ready', browserSync.reload);
}

const build = series(watchFiles);

export {js,css, img}
export default build;
