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
    '_dev/js/*.js',
    '_dev/js/**/*.js',
    '_dev/scss/*.scss',
    '_dev/scss/**/*.scss',
    '_dev/scss/**/**/*.scss'
  ], ['scss', 'js']);
});

gulp.task('scss', function () {
  gulp.src('_dev/scss/index.scss')
    .pipe(sass({ outputStyle: 'compressed' }))
    .pipe(autoprefixer())
    .pipe(gulp.dest('assets'))
  ;
});

gulp.task('js', function () {
  gulp.src('_dev/js/index.js')
    .pipe(gulpWebpack({
      module: {
        loaders: [{
          test: /\.jsx?$/,
          exclude: /node_modules/,
          loader: 'babel-loader'
        }]
      },
      plugins: [
        new webpack.optimize.UglifyJsPlugin(),
        new webpack.ProvidePlugin({
          $: 'jquery',
          jQuery: 'jquery',
          Popper: 'popper.js'
        })
      ],
      output: {
        filename: 'all.js'
      }
    }, webpack))
    .pipe(gulp.dest('assets'))
  ;
});
