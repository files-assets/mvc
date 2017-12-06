require('./vendor/bootstrap.js');

(function () {
  const NProgress = require('./vendor/nprogress.js');

  NProgress.start();

  $(window).on('load', function () {
    NProgress.done();
  });
}());

/**
 * Code goes here:
 */
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
