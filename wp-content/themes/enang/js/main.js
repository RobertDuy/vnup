
$(document).ready(function() {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.sclTopNews').fadeIn();
        } else {
            $('.sclTopNews').fadeOut();
        }
    });

    $('.sclTopNews').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    
    $('#nav li a').click(function(){
        $(this).addClass('active');
    });
});