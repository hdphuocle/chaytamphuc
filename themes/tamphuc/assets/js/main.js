$(document).ready(function () {


    $("div.blog-post").hover(
        function () {
            $(this).find("div.content-hide").slideToggle("fast");
        },
        function () {
            $(this).find("div.content-hide").slideToggle("fast");
        }
    );

    $('.flexslider').flexslider({
        prevText: '',
        nextText: ''
    });

    $('.testimonails-slider').flexslider({
        animation: 'slide',
        slideshowSpeed: 5000,
        prevText: '',
        nextText: '',
        controlNav: false
    });

    $('#category-tabs li a').click(function(){
        $(this).next('ul').slideToggle('500');
        $(this).find('i').toggleClass('fa-minus fa-plus ')
    });
    $('.carousel').carousel()


});
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200)   // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200); // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

