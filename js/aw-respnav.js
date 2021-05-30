$(function() {
var pull 	= $('#pull');
menu 		= $('#respone ul');
menuHeight	= menu.height();

$(pull).on('click', function(e) {
e.preventDefault();
menu.slideToggle();
});

$(window).resize(function() {
var w = $(window).width();
if(w > 480 && menu.is(':hidden')) {
menu.removeAttr('style');
}
});
});

$(function() {
var pulltwo 	= $('#pulltwo');
menutwo 	= $('#resptwo ul');
menutwoHeight	= menutwo.height();

$(pulltwo).on('click', function(e) {
e.preventDefault();
menutwo.slideToggle();
});

$(window).resize(function() {
var w = $(window).width();
if(w > 480 && menutwo.is(':hidden')) {
menutwo.removeAttr('style');
}
});
});

$(function() {
var pullthree 	= $('#pullthree');
menuthree 	= $('#respthree ul');
menuthreeHeight	= menuthree.height();

$(pullthree).on('click', function(e) {
e.preventDefault();
menuthree.slideToggle();
});

$(window).resize(function() {
var w = $(window).width();
if(w > 480 && menuthree.is(':hidden')) {
menuthree.removeAttr('style');
}
});
});

$(function() {
var pullfour 	= $('#pullfour');
menufour 	= $('#respfour ul');
menufourHeight	= menufour.height();

$(pullfour).on('click', function(e) {
e.preventDefault();
menufour.slideToggle();
});

$(window).resize(function() {
var w = $(window).width();
if(w > 480 && menufour.is(':hidden')) {
menufour.removeAttr('style');
}
});
});