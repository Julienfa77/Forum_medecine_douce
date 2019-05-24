// (jQuery version)
$(window).scroll(function() {
    var y = $(this).scrollTop(); // Pos
    var r = 10; // Rate
    $('body').css('background-position', 'center ' + parseInt(y/r) + 'px');
});
