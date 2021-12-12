"use strict";

// Scripts for twentytwentyone-child
//Antti Suomi 12.12.21
j = jQuery; //console.log('hello world');

function dupecheck(id) {
  j('#' + id).each(function (i) {
    console.log('hiding' + id);
    j('[id="' + this.id + '"]').slice(1).remove();
  });
} // jQuery( "div" ).each(function() {
//     var i = jQuery(this).attr('id');
//     console.log('checking' + i);
//     dupecheck(i);
// });