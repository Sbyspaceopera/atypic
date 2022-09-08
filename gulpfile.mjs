import gulp from 'gulp';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import imagemin from 'gulp-imagemin';

const sass = gulpSass( dartSass );

gulp.task( 'styles', () => {
	return gulp
		.src( 'assets/scss/*.scss' )
		.pipe( sass().on( 'error', sass.logError ) )
		.pipe( gulp.dest( './build/css' ) );
} );

gulp.task( 'imgMin', async function () {
	gulp.src( 'assets/images/*' )
		.pipe( imagemin() )
		.pipe( gulp.dest( 'build/images' ) );
} );

gulp.task( 'watch', () => {
	gulp.watch( [ 'assets/scss/*.scss', 'assets/images/*' ], ( done ) => {
		gulp.series( [ 'styles', 'imgMin' ] )( done );
	} );
} );

gulp.task( 'default', gulp.series( [ 'styles', 'imgMin', 'watch' ] ) );
