(function ($) {
    "use strict";

    // Spinner — wait for full page load, with a minimum display time and safety cap.
    (function () {
        var $spinner = $('#spinner');
        if (!$spinner.length) return;

        var startedAt = Date.now();
        var MIN_DURATION = 1200;  // animatsiya ko'rinishi uchun minimal vaqt
        var MAX_DURATION = 8000;  // 'load' hech qachon ishlamasa, eng ko'p kutiladigan vaqt
        var hidden = false;

        function hide() {
            if (hidden) return;
            hidden = true;
            $spinner.removeClass('show');
        }

        function scheduleHide() {
            var elapsed = Date.now() - startedAt;
            var remaining = Math.max(0, MIN_DURATION - elapsed);
            setTimeout(hide, remaining);
        }

        if (document.readyState === 'complete') {
            // Sahifa allaqachon yuklangan (masalan, brauzer 'back' bilan kelganda)
            scheduleHide();
        } else {
            $(window).one('load', scheduleHide);
        }

        // Xavfsizlik: agar biror resurs cheksiz osilib qolsa, baribir yashir.
        setTimeout(hide, MAX_DURATION);
    })();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').addClass('shadow-sm').css('top', '0px');
        } else {
            $('.sticky-top').removeClass('shadow-sm').css('top', '-100px');
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            }
        }
    });


    // Portfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });
    $('#portfolio-flters li').on('click', function () {
        $("#portfolio-flters li").removeClass('active');
        $(this).addClass('active');

        portfolioIsotope.isotope({filter: $(this).data('filter')});
    });
    
})(jQuery);

