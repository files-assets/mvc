// Gulp:
let gulp = require('gulp');

// CSS:
let sass = require('gulp-sass');
let autoprefixer = require('gulp-autoprefixer');

// JS:
let webpack = require('webpack');
let gulpWebpack = require('gulp-webpack');

// Taks:
gulp.task('default', ['scss', 'js', 'watch']);

gulp.task('watch', function () {
  gulp.watch([
    '_front-end/js/*.js',
    '_front-end/js/**/*.js',
    '_front-end/scss/*.scss',
    '_front-end/scss/**/*.scss',
    '_front-end/scss/**/**/*.scss'
  ], ['scss', 'js']);
});

gulp.task('scss', function () {
  gulp.src('_front-end/scss/index.scss')
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer())
    .pipe(gulp.dest('_front-end-src'))
  ;
});

gulp.task('js', function () {
  gulp.src('_front-end/js/index.js')
    .pipe(gulpWebpack({
      module: {
        loaders: [{
          test: /\.jsx?$/,
          exclude: /node_modules/,
          loader: 'babel-loader'
        }]
      },
      plugins: [new webpack.optimize.UglifyJsPlugin()],
      output: {
        filename: 'all.js'
      }
    }, webpack))
    .pipe(gulp.dest('_front-end-src'))
  ;
});
