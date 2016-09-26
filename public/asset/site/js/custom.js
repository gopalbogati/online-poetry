/**
 * Created by raghu on 8/4/16.
 */
//Code to hide right nav content when click outside
$('#nav-toggle-big').click(function (event) {
    event.stopPropagation();
});
$('.right-panel').click(function (event) {
    event.stopPropagation();
});

$('body').click(function () {
    if ($('.right-panel').hasClass('right-panel-open-big')) {
        $('.right-panel').removeClass('right-panel-open-big');
        $('#nav-toggle-big').toggleClass('right-panel-open-big-toggle-big');
    }
});

$(document).ready(function () {
    (function () {

        function calc() {
            var w = window.innerWidth;
            var h = window.innerHeight;

            $("#banner").height(h);
        }

        $(window).resize(function () {
            calc();
        });

        calc();
    })();

    (function () {
        $('#nav-toggle').click(function () {
            $('.right-panel').toggleClass('right-panel-open');
        });
    })();

    (function () {
        $('#nav-toggle-big').click(function () {
            $('#nav-toggle-big').toggleClass('right-panel-open-big-toggle-big');
            $('.right-panel').toggleClass('right-panel-open-big');

//              if($(this).hasClass('active')){
//                $(this).removeClass('active');
//                $(this).addClass('inactive');
//              }
//              else if($(this).hasClass('inactive')){
//                $(this).removeClass('inactive');
//                $(this).addClass('active');
//              }
//              else{
//                $(this).addClass('active');
//              }


        });
    })();

    $('#scrollToTop').click(function () {
        $("html, body").animate({scrollTop: 0}, "slow");
        return false;
    });
});

function resize() {
    var height = $(window).innerHeight();
    var width = $(window).innerWidth();

    if (width < 992) {
        $('.fullPage').css('min-height', height);
    }
    else {
        $('.fullPage').css('min-height', height);
    }

}

function resize1() {
    var height = $(window).innerHeight();
    var width = $(window).innerWidth();

    if (width < 992) {
        $('.fullPageIn').css('min-height', height - 170);
    }
    else {
        $('.fullPageIn').css('min-height', height - 170);
    }

}

$(window).resize(function () {
    resize();
    resize1();
});
$(document).ready(function () {
    resize();
    resize1();
});
//Cache reference to window and animation items
var $animation_elements = $('.animation-element');
var $window = $(window);

function check_if_in_view() {
    if ($(window).scrollTop() > $(window).innerHeight()) {
        $('#scrollToTop').css('display', 'block');
    }
    else {
        $('#scrollToTop').css('display', 'none');
    }

    var window_height = $window.height();
    var window_top_position = $window.scrollTop();
    var window_bottom_position = (window_top_position + window_height);

    $.each($animation_elements, function () {
        var $element = $(this);
        var element_height = $element.outerHeight();
        var element_top_position = $element.offset().top;
        var element_bottom_position = (element_top_position + element_height);

        //check to see if this current container is within viewport
        if ((element_bottom_position >= window_top_position) &&
            (element_top_position <= window_bottom_position)) {
            $element.addClass('animated fadeInRight');
        } else {
            $element.removeClass('animated fadeInRight');
        }
    });
}

$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');

$('.select2').select2();

lightbox.option({
    'positionFromTop': 180,
    'alwaysShowNavOnTouchDevices': true
})
// Booking
// function updateAmount() {
//     var total = parseFloat($("#amt").val());
//     $("#tAmt").val(total);
// }
//
// $(document).on("change, keyup", "#amt", updateAmount);

// $('#payesewa').change(function () {
//     $('#amt').prop("disabled", false);
// });
// $('#paycounter').change(function () {
//     $('#amt').prop("disabled", true);
// });
