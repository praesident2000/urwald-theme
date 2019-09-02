var gulp         = require('gulp');
var gulpSass     = require('gulp-sass');
var uglifycss    = require('gulp-uglifycss');
var autoprefixer = require('gulp-autoprefixer');

function sass(done) {
    gulp.src('./sass/**/*.scss')
      .pipe(gulpSass().on('error', gulpSass.logError))
      .pipe(gulp.dest('./css'));
    done();
};

function css(done) {
    gulp.src('./css/**/*.css')
        .pipe(autoprefixer({
        //   browsers: ['last 2 versions'],
          cascade: false
        }))
        .pipe(uglifycss({
          "uglyComments": true
        }))
        .pipe(gulp.dest('./dist/'));

    done();
};

function watchFiles() {
    gulp.watch('sass/**/*.scss', sass);
    gulp.watch('css/**/*.css', css);
}

gulp.task("sass", sass);

gulp.task("css", css);

gulp.task("default", gulp.parallel(sass,css,watchFiles));

gulp.task('run', gulp.parallel(sass,css));

gulp.task('watch', gulp.series(watchFiles));
