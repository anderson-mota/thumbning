var gulp    = require('gulp');
var uglify  = require('gulp-uglify');
var concat  = require('gulp-concat');
var wiredep = require('wiredep');
var watch   = require('gulp-watch');
var livereload = require('gulp-livereload');
var compass = require('gulp-compass');

gulp.task('compress-vendor', function() {
    return gulp.src(wiredep().js)
        .pipe(concat('vendor.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js'));
});

gulp.task('compress', function() {
    return gulp.src('public/app/**')
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js'));
});

gulp.task('compass', function() {
    return gulp.src('./public/src/sass/*.scss')
        .pipe(compass({
            config_file: './config.rb',
            css: 'public/assets/css',
            sass: 'public/src/sass'
        }))
        .pipe(gulp.dest('public/assets/css'))
        .pipe(livereload());
});

gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('public/app/**', ['compress']).on('change', livereload.changed);
    gulp.watch('public/src/sass/*.scss', ['compass']);
});