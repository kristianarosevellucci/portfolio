var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('default', ['compile']);

gulp.task('compile', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/'));
});
