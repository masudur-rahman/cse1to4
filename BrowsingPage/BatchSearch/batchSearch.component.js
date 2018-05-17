$(function() {

    var $sidebar   = $(".batchSearch"),
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 18;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding - 18
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 18
            });
        }
    });

});