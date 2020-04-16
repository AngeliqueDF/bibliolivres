let gulp = require("gulp");
const browserSync = require('browser-sync').create();
var terser = require('gulp-terser');
var replace = require('gulp-replace');
var rename = require('gulp-rename');
var postcss = require('gulp-postcss');
var cssnano = require('cssnano');

//css
//cssnano
function css() {
    var plugins = [
        //config in .browserslistrc
        cssnano() //optimization
    ];
    return gulp.src('./app/src/style/style.css')
        //parse CSS once
        .pipe(postcss(plugins))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('./app/dist/css/'))
        .pipe(browserSync.stream());
}

//js
//terser
function js() {
    return gulp.src('./app/src/js/**/*.js')
        .pipe(terser())
        .pipe(replace('.js', '.min.js'))
        .pipe(rename({
            //rename
            suffix: '.min'
        }))
        .pipe(gulp.dest('./app/dist/js'))
        .pipe(browserSync.stream());
}

function watch() {

    browserSync.init({
        proxy: "http://localhost:8888/"
    });

    gulp.watch("./*.php").on("change", browserSync.reload);
    gulp.watch("./app/**/*.php").on("change", browserSync.reload);

    gulp.watch('./app/src/style/style.css', css);
    gulp.watch('./app/src/style/style.css').on("change", browserSync.reload);

    gulp.watch("./app/src/js/*.js", js);
    gulp.watch("./app/src/js/*.js").on("change", browserSync.reload);
}

exports.css = css;
exports.js = js;
exports.watch = watch;