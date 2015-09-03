var gulp    = require('gulp');
var uglify  = require('gulp-uglify');
var concat  = require('gulp-concat');
var wiredep = require('wiredep');

gulp.task('compress-vendor', function() {
    return gulp.src(wiredep().js)
        .pipe(concat('vendor.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js'));
});

gulp.task('compress', function() {
    return gulp.src('public/app/**')
        .pipe(concat('main.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js'));
});