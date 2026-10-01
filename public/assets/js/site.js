document.addEventListener('DOMContentLoaded', function () {
    var sticky = jQuery('.header');
    var returnToTop = jQuery('#return-to-top');
    var isSticky = false;

    window.addEventListener('scroll', function () {
        var scroll = window.pageYOffset || document.documentElement.scrollTop;
        if (scroll >= 500 && !isSticky) {
            sticky.addClass('my-fixed');
            isSticky = true;
        } else if (scroll < 500 && isSticky) {
            sticky.removeClass('my-fixed');
            isSticky = false;
        }

        if (scroll >= 50) {
            returnToTop.fadeIn(200);
        } else {
            returnToTop.fadeOut(200);
        }
    }, { passive: true });

    returnToTop.on('click', function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    if (jQuery('.slick.marquee').length && typeof jQuery.fn.slick === 'function') {
        jQuery('.slick.marquee').slick({
            speed: 10000,
            autoplay: true,
            autoplaySpeed: 0,
            centerMode: true,
            cssEase: 'linear',
            slidesToShow: 1,
            slidesToScroll: 0.5,
            variableWidth: true,
            infinite: true,
            initialSlide: 1,
            arrows: false,
            buttons: false,
            pauseOnHover: true,
            pauseOnFocus: true,
            focusOnSelect: true,
        });
    }

    function initSwiper(selector, options) {
        if (typeof Swiper !== 'undefined' && document.querySelector(selector)) {
            return new Swiper(selector, options);
        }
        return null;
    }

    initSwiper(".homeSwiper", { slidesPerView: 1, spaceBetween: 30, autoplay: { delay: 4000 }, pagination: { el: ".hb-pagi", clickable: true } });
    initSwiper(".frame-works", { slidesPerView: 1, spaceBetween: 30, pagination: { el: ".fw-pagi", clickable: true }, breakpoints: { 767: { slidesPerView: 4 }, 1200: { slidesPerView: 5 } } });
    initSwiper(".ods-logos", { slidesPerView: 1, spaceBetween: 30, pagination: { el: ".ods-pagi", clickable: true }, breakpoints: { 767: { slidesPerView: 4 }, 1200: { slidesPerView: 5 } } });
    
    jQuery('.rdbtn').on('click', function () {
        jQuery(this).text(function (i, old) { return old === 'Read more' ? 'Read Less' : 'Read More'; });
    });

    initSwiper(".service-slider", { slidesPerView: "1", spaceBetween: 30, autoplay: { delay: 4000 }, pagination: { el: ".ss-pagi", clickable: true }, navigation: { nextEl: ".ss-next", prevEl: ".ss-prev" }, breakpoints: { 767: { slidesPerView: 2 }, 1200: { slidesPerView: 3 } } });
    initSwiper(".clients-slider", { slidesPerView: "1", spaceBetween: 30, autoplay: { delay: 4000 }, pagination: { el: ".clients-pagi", clickable: true }, navigation: { nextEl: ".cp-next", prevEl: ".cp-prev" }, breakpoints: { 767: { slidesPerView: 4 }, 1200: { slidesPerView: 5 } } });
    initSwiper(".contactclients-slider", { slidesPerView: "2", spaceBetween: 30, autoplay: { delay: 4000 }, pagination: { el: ".cclients-pagi", clickable: true }, navigation: { nextEl: ".ccp-next", prevEl: ".ccp-prev" }, breakpoints: { 767: { slidesPerView: 4 }, 1080: { slidesPerView: 3 } } });
    initSwiper(".testmonial-slider", { slidesPerView: "1", autoplay: { delay: 4000 }, breakpoints: { 767: { slidesPerView: 1 }, 1200: { slidesPerView: 1 } } });
    initSwiper(".seoCS", { slidesPerView: "1", spaceBetween: 30, autoHeight: true, autoplay: { delay: 4000 }, pagination: { el: ".seocs-pagi", clickable: true }, navigation: { nextEl: ".seocs-next", prevEl: ".seocs-prev" } });
    
    var proSlider = initSwiper(".proSlider", { spaceBetween: 10, slidesPerView: 1, freeMode: true, watchSlidesProgress: true, breakpoints: { 767: { slidesPerView: 3 }, 1080: { slidesPerView: 4 }, 1200: { slidesPerView: 5 } } });
    if (proSlider) {
        initSwiper(".proSlider2", { spaceBetween: 10, autoHeight: true, navigation: { nextEl: ".pro-nxt", prevEl: ".pro-pre" }, thumbs: { swiper: proSlider } });
    }

    var proSlider3 = initSwiper(".proSlider3", { spaceBetween: 10, slidesPerView: 1, freeMode: true, watchSlidesProgress: true, breakpoints: { 767: { slidesPerView: 3 }, 1080: { slidesPerView: 4 }, 1200: { slidesPerView: 5 } } });
    if (proSlider3) {
        initSwiper(".proSlider4", { spaceBetween: 10, autoHeight: true, navigation: { nextEl: ".pro1-nxt", prevEl: ".pro1-pre" }, thumbs: { swiper: proSlider3 } });
    }

    var dmproSlider = initSwiper(".dmproSlider", { spaceBetween: 10, slidesPerView: 1, freeMode: true, watchSlidesProgress: true, breakpoints: { 767: { slidesPerView: 3 }, 1080: { slidesPerView: 4 }, 1200: { slidesPerView: 4 } } });
    if (dmproSlider) {
        initSwiper(".dmproSlider1", { spaceBetween: 10, autoHeight: true, navigation: { nextEl: ".dmpro-nxt", prevEl: ".dmpro-pre" }, thumbs: { swiper: dmproSlider } });
    }

    initSwiper(".serv-testimonial", { slidesPerView: "1", spaceBetween: 30, autoHeight: true, loop: true, autoplay: { delay: 1, disableOnInteraction: false, pauseOnMouseEnter: true }, speed: 3000, breakpoints: { 767: { slidesPerView: 2 }, 1080: { slidesPerView: 2 }, 1200: { slidesPerView: 3 } } });

    jQuery('.kmbtn').on('click', function () {
        var target = jQuery("#knowMore");
        if (target.length) {
            window.scrollTo({ top: target.offset().top - 50, behavior: 'smooth' });
        }
    });
});

function openTabs(evt, hSolutions) {
    var i, htabcontent, htablinks;
    htabcontent = document.getElementsByClassName("htabcontent");
    for (i = 0; i < htabcontent.length; i++) {
        htabcontent[i].style.display = "none";
        htabcontent[i].classList.remove("fade-in");
    }
    htablinks = document.getElementsByClassName("htablinks");
    for (i = 0; i < htablinks.length; i++) {
        htablinks[i].classList.remove("active");
    }
    var target = document.getElementById(hSolutions);
    if (target) {
        target.classList.add("fade-in");
        target.style.display = "block";
    }
    if (evt && evt.currentTarget) {
        evt.currentTarget.classList.add("active");
    }
}
if (document.getElementById("defaultOpen")) {
    document.getElementById("defaultOpen").click();
}
