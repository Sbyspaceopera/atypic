import gulp from 'gulp';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import del from 'del';
import imagemin from "gulp-imagemin";

const sass = gulpSass(dartSass);

gulp.task('styles', () => {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./build/css'));
});

gulp.task('imgMin', () => {
    gulp.src('assets/images/*')
		.pipe(imagemin())
		.pipe(gulp.dest('build/images'))
})

gulp.task('watch', () => {
    gulp.watch('assets/scss/*.scss', (done) => {
        gulp.series(['styles'])(done);
    });
});

gulp.task('default', gulp.series(['styles', 'watch']));