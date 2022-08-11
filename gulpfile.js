const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const del = require('del');

gulp.task('styles', () => {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./build/css'));
});

gulp.task('watch', () => {
    gulp.watch('assets/scss/*.scss', (done) => {
        gulp.series(['styles'])(done);
    });
});

gulp.task('default', gulp.series(['watch']));