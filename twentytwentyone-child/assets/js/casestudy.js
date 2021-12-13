// Scripts for twentytwentyone-child
//Antti Suomi 12.12.21

j = jQuery;
// //console.log('hello world');
//*check for doubles
function dupecheck(id) {
    j('#'+id).each(function () {
        //*debug
        //console.log('removing'+id)
        jQuery('[id="' + this.id + '"]:gt(0)').remove();
    });
}

//*check for doubles/iterate through card class divs
function clean() {
    jQuery(".card").each(function () {
        var i = jQuery(this).attr('id');
        //*debug
        // console.log('checking ' + i);
        dupecheck(i);
    });
}

//* this removes all but 9 cards
function trimtonine() {
    jQuery('.card').slice(9).remove();
}



//*check if we show three of all of the posts
function evenout() {
    var a = jQuery("div#ecommerce div.card").length;
    var b = jQuery("div#service-design div.card").length;
    var c = jQuery("div#software-development div.card").length;
    //*debug
    //console.log(a, b, c);
    //* if not, shuffle
    if (a < b) {
        jQuery(".movetoecommerce").appendTo("#ecommerce");
    }
    if (a < c) {
        jQuery(".movetoecommerce").appendTo("#ecommerce");
    }

    if (b < a) {
        jQuery(".movetoservice-design").appendTo("#ecommerce");
    }
    if (b < c) {
        jQuery(".movetoservice-design").appendTo("#ecommerce");
    }

    if (c < b) {
        jQuery(".movetosoftware-development").appendTo("#software-development");
    }

    if (c < a) {
        jQuery(".movetosoftware-development").appendTo("#software-development");
    }
}

//*And all together
jQuery(document).ready(function () {
    clean();
    trimtonine();
    evenout();
})