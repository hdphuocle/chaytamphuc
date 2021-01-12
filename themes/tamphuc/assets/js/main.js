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
});



