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
import webpackConfig from './webpack.config.js'

const {watch, dest, src, series} = gulpPkg

function js() {
	src('src/index.js')
		//Compiler is needed to allow gulp to watch
		//See webpack-stream docs
		.pipe(webpack(webpackConfig, compiler))
		.pipe(dest('build/js'));
}


function css() {
	const sass = gulpSass(dartSass);
	const pluginsPostCSS = [autoprefixer, cssnano] 

	return src(['assets/scss/*.scss', 'style.css'], {sourcemaps:true})
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss(pluginsPostCSS))
		.pipe(rename((path) => path.extname = '.min.css'))
		.pipe(dest('./build/css', {sourcemaps:true}));
}

async function img() {
	src('assets/images/*').pipe(imagemin()).pipe(dest('build/images'));
}

function watchFiles() {
	const browserSync = browserSyncObject.create();

	browserSync.init({
		proxy: 'testing.local',
	});

	watch(['assets/scss/*.scss', 'style.css'], { ignoreInitial: false }, css).on('change', browserSync.reload);
	watch('src/*.js', { ignoreInitial: false }, js).on('change', browserSync.reload);
	watch('assets/images/*', { ignoreInitial: false }, img).on('change', browserSync.reload);
}

const build = series(watchFiles);

export default build;
