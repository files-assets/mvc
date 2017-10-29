import $ from 'jquery';

window.$ = $;
window.jQuery = window.$;


/**
 * Code goes here:
 */
$(function () {
  $('<span>', {
    'style': [
      'background-color: red',
      'color: #fff'
    ].join(';'),
    'text': 'Running.'
  }).appendTo('body');
});
