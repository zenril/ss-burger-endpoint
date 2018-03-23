var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('build', function () {
    return gulp.src(['./themes/simple/sass/**/*.scss'])
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./themes/simple/css'));
});
 
gulp.task('watch', function () {
    gulp.watch('./themes/simple/sass/**/*.scss', ['build']);
});