import gulpPkg from 'gulp';

import dartSass from 'sass';
import gulpSass from 'gulp-sass';

import imagemin from 'gulp-imagemin';

import postcss from 'gulp-postcss';
import autoprefixer from 'gulp-postcss';
import postcssNested from 'postcss-nested';
import cssNano from 'gulp-postcss';

import babel from 'gulp-babel';
import minify from 'gulp-imagemin';
import stripDebug from 'gulp-strip-debug';

import rename from 'gulp-rename';

import browserSyncObject from 'browser-sync';

const {watch, dest, src, series} = gulpPkg

async function js() {
	src('assets/src/*.js', {sourcemaps:true})
		.pipe(stripDebug())
		.pipe(
			babel({
				presets: ['@babel/env'],
			})
		)
		.pipe(minify())
		.pipe(rename((path) => path.extname = '.min.js'))
		.pipe(dest('build/js', {sourcemaps:true}));
}

const sass = gulpSass(dartSass);

function css() {
	return src('assets/scss/*.scss', {sourcemaps:true})
		.pipe(sass().on('error', sass.logError))
		.pipe(postcss([autoprefixer, postcssNested, cssNano]))
		.pipe(rename((path) => path.extname = '.min.css'))
		.pipe(dest('./build/css', {sourcemaps:true}));
}

function img() {
	src('assets/images/*').pipe(imagemin()).pipe(dest('build/images'));
}

function watchFiles() {
	const browserSync = browserSyncObject.create();

	browserSync.init({
		proxy: 'testing.local',
	});

	watch('assets/scss/*.scss', { ignoreInitial: false }, css).on('change', browserSync.reload);
	watch('assets/src/*.js', { ignoreInitial: false }, js).on('change', browserSync.reload);
	watch('assets/images/*', { ignoreInitial: false }, img).on('change', browserSync.reload);
}

const build = series(watchFiles);

export default build;
