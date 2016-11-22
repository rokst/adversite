'use strict';

var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var dir = {
    assets: './app/Resources/',
    jsScripts: './app/Resources/scripts/',
    dist: './web/',
    bower: './bower_components/'
};

var paths = {
    scripts: [
        dir.bower + 'jquery/dist/jquery.min.js',
        dir.bower + 'bower_components/bootstrap/dist/js/bootstrap.min.js',
        dir.assets + 'scripts/**'
    ],
    images: [
        dir.assets + 'images/**'
    ],
    css: [
        dir.bower + 'bootstrap/dist/css/bootstrap.min.css',
        dir.assets + 'style/**',
    ],
    fonts: [
        dir.assets + 'fonts/**'
    ]
};


gulp.task('css', function () {
    gulp.src(paths.css)
        .pipe(concat('style.css'))
        .pipe(gulp.dest(dir.dist + 'css'));
});

gulp.task('scripts', function () {
    gulp.src(paths.scripts)
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(gulp.dest(dir.dist + 'js'));
});

gulp.task('images', function () {
    gulp.src(paths.images)
        .pipe(gulp.dest(dir.dist + 'images'));
});

gulp.task('fonts', function () {
    gulp.src(paths.fonts)
        .pipe(gulp.dest(dir.dist + 'fonts'));
});

gulp.task('watch', function () {
    var css = gulp.watch(paths.css, ['css']);
    var images = gulp.watch(paths.images, ['images']);
    var fonts = gulp.watch(paths.fonts, ['fonts']);
    var scripts = gulp.watch(paths.scripts, ['scripts']);
});

gulp.task('default', ['css', 'scripts', 'images', 'fonts']);
