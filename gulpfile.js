'use strict';

const postcss = require('gulp-postcss');
const gulp = require('gulp');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const newer = require('gulp-newer');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();

const source = {
    root: "./",
    build: "./",
    mamp: ""
};

const port = {
    nginx: 7888,
    apache: 8888,
};

gulp.task('css:for:prod', function () {
    var plugins = [
        autoprefixer({ browsers: ['last 4 versions'] }),
        cssnano()
    ];

    return gulp.src(source.root + '*.css')
        .pipe(postcss(plugins))
        .pipe(gulp.dest(source.build));
});

gulp.task('php:to:build', function () {
    return gulp.src(source.root + '*.php')
        .pipe(newer(source.build))
        .pipe(gulp.dest(source.build));
});

gulp.task('mamp:to:host', function () {
    return gulp.src(source.build + '*.*')
        .pipe(gulp.dest(source.mamp));
});

gulp.task('browse:start', function () {
    browserSync.init({
        proxy: "http://localhost:" + port.nginx + "/wordpress",
        browser: ["chrome", "firefox"]
    });
    gulp.watch(source.build + '*.css').on("change", browserSync.reload);
    gulp.watch(source.build + '*.php').on("change", browserSync.reload);
});

gulp.task('sass:to:build', function () {
    return gulp.src(source.root + "/scss/*.scss")
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(source.build));
});

gulp.task('watch:for:dev', function () {
    gulp.watch(source.root + "*.*", ['css:for:prod']);
    gulp.watch(source.root + "/scss/*.scss", ['sass:to:build']);
});

gulp.task('default', ['watch:for:dev']);
