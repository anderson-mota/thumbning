var gulp    = require('gulp');
var uglify  = require('gulp-uglify');
var concat  = require('gulp-concat');
var wiredep = require('wiredep');

gulp.task('compress', function() {
    return gulp.src(wiredep().js)
        .pipe(uglify())
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('public/assets/js'));
});