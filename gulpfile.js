var gulp = require('gulp');
var rename = require('gulp-rename');

gulp.task('default', function() {
    // place code for your default task here
});

/**
 * Copies all bower dependencies to the public/assets folder
 */
gulp.task('bower', function() {
    // copy all JS files
    gulp.src(['bower_components/**/dist/**/*.js'])
        .pipe(rename({dirname: ''}))
        .pipe(gulp.dest('public/assets/js'));

    // copy all CSS files
    gulp.src(['bower_components/**/dist/**/*.css'])
        .pipe(rename({dirname: ''}))
        .pipe(gulp.dest('public/assets/css'));
});