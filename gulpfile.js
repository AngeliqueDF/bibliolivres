let gulp = require("gulp");
const browserSync = require('browser-sync').create();
var terser = require('terser');
var rename = require('gulp-rename');
var postcss = require('gulp-postcss');
var cssnano = require('cssnano');


//css
//cssnano

//js
//terser

function watch() {
    browserSync.init({
        proxy: "http://localhost:8888/"
    });
    gulp.watch("./*.php").on("change", browserSync.reload);
    gulp.watch("./app/**/*.php").on("change", browserSync.reload);
}

exports.watch = watch;