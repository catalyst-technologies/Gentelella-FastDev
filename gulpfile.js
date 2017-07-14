var gulp = require('gulp');
var gutil = require('gulp-util');
var php2html = require("gulp-php2html");
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sass = require('gulp-ruby-sass');
var coffee = require('gulp-coffee');
var coffeeify = require('gulp-coffeeify');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
require('gulp-grunt')(gulp);
var DEST = 'assets/';
gulp.task('coffee', function () {
    console.log('----- compiling coffee scripts');
    gulp.src('./src/coffee/main.coffee')
            .pipe(coffee({bare: true}).on('error', gutil.log))
            .pipe(gulp.dest('./src/js/'));
});
gulp.task('coffeeify', function () {
    gulp.src('src/coffee/*.coffee')
            .pipe(coffeeify())
            .pipe(gulp.dest('./assets/js'));
});

var compileSASS = function (filename, options) {
    return sass('src/scss/main.scss', options)
            .pipe(autoprefixer('last 2 versions', '> 5%'))
            .pipe(concat(filename))
            .pipe(gulp.dest(DEST + '/css'))
            .pipe(browserSync.stream());
};
gulp.task('sass', function () {
    return compileSASS('main.css', {});
});
gulp.task('sass-minify', function () {
    return compileSASS('main.min.css', {style: 'compressed'});
});
gulp.task('php2html', function () {
    gulp.src("./src/php/*.php")
            .pipe(php2html({verbose:true}))
            .pipe(gulp.dest("./dist"));
})
gulp.task('browser-sync', function () {
    browserSync.init({
        server: {
            baseDir: './'
        },
        startPath: './dist/index.html'
    });
});
gulp.task('reload', function () {
    browserSync.reload();
});
gulp.task('php-watch', function () {
    // Watch .php files
    gulp.watch('src/php/*.php', ['reload', 'php2html']);
    gulp.watch('src/php/**/*.php', ['reload', 'php2html']);
    // Watch .coffee files
    gulp.watch('src/coffee/*.coffee', ['coffeeify']);
    gulp.watch('src/coffee/**/*.coffee', ['coffeeify']);
    // Watch .scss files
    gulp.watch('src/scss/*.scss', ['sass', 'sass-minify']);
    gulp.watch('src/scss/**/*.scss', ['sass', 'sass-minify']);
});
// Default Task
gulp.task('default', ['browser-sync', 'php-watch']);
