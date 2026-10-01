(function() {
  function initSwiper(selector, options) {
    if (typeof Swiper !== 'undefined' && document.querySelector(selector)) {
      return new Swiper(selector, options);
    }
    return null;
  }

  var respro = initSwiper(".resproSlider", { spaceBetween: 10, slidesPerView: 1, freeMode: true, watchSlidesProgress: true, breakpoints: { 767: { slidesPerView: 1 }, 1080: { slidesPerView: 1 }, 1200: { slidesPerView: 1 } } });
  if (respro) {
    initSwiper(".resproSlider1", { spaceBetween: 10, autoHeight: true, navigation: { nextEl: ".respro-nxt", prevEl: ".respro-pre" }, thumbs: { swiper: respro } });
  }

  initSwiper(".testmonial-slider", { slidesPerView: "1", autoplay: { delay: 4000 }, breakpoints: { 767: { slidesPerView: 1 }, 1200: { slidesPerView: 1 } } });
  initSwiper(".newtestSwiper", { slidesPerView: 1, spaceBetween: 10, pagination: { el: ".swiper-pagination", clickable: true }, breakpoints: { 640: { slidesPerView: 1, spaceBetween: 20 }, 768: { slidesPerView: 2, spaceBetween: 20 }, 1024: { slidesPerView: 3, spaceBetween: 20 } } });

  initSwiper(".testiuxSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: { delay: 3000, disableOnInteraction: false },
    pagination: { el: ".testiux-pagination", clickable: true },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 20 },
      768: { slidesPerView: 2, spaceBetween: 30 },
      1024: { slidesPerView: 3, spaceBetween: 30 },
    },
  });

  initSwiper(".bblogSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: { el: ".swiper-pagination", clickable: true },
    breakpoints: {
      640: { slidesPerView: 2, spaceBetween: 20 },
      768: { slidesPerView: 2, spaceBetween: 30 },
      1024: { slidesPerView: 3, spaceBetween: 30 },
    },
  });

  initSwiper(".caseSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: { el: ".swiper-pagination", clickable: true },
    breakpoints: {
      640: { slidesPerView: 2, spaceBetween: 20 },
      768: { slidesPerView: 2, spaceBetween: 20 },
      1024: { slidesPerView: 3, spaceBetween: 20 },
    },
  });

  initSwiper(".whatOurClientSaySwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    autoplay: true,
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 10 },
      768: { slidesPerView: 1, spaceBetween: 10 },
      1024: { slidesPerView: 1, spaceBetween: 10 },
    },
  });

  // location-slider of map
  document.addEventListener('DOMContentLoaded', function() {
    var locSliderEl = document.querySelector(".location-slider");
    if (locSliderEl && typeof Swiper !== 'undefined') {
      var locSwiper = new Swiper(".location-slider", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
          640: { slidesPerView: 1 },
          768: { slidesPerView: 1.5 },
          1024: { slidesPerView: 2.4 }
        }
      });

      var markers = document.querySelectorAll(".location-marker");
      var slides = document.querySelectorAll(".location-slider .swiper-slide");
      markers.forEach(function(marker) {
        marker.addEventListener("click", function() {
          var slideIndex = parseInt(this.getAttribute("data-slide"));
          markers.forEach(function(m) { m.classList.remove("active"); });
          this.classList.add("active");
          slides.forEach(function(slide) { slide.classList.remove("active"); });
          if (slides[slideIndex]) slides[slideIndex].classList.add("active");
          locSwiper.slideTo(slideIndex);
        });
      });

      locSwiper.on('slideChange', function() {
        var activeIndex = locSwiper.activeIndex;
        markers.forEach(function(marker) {
          marker.classList.remove("active");
          if (parseInt(marker.getAttribute("data-slide")) === activeIndex) {
            marker.classList.add("active");
          }
        });
      });
    }

    initSwiper(".dmagency-banner-sld", {
      slidesPerView: 1,
      speed: 1000,
      autoplay: { delay: 3000, disableOnInteraction: false },
      pagination: { el: ".dmagency-pagi", clickable: true },
    });
  });

  initSwiper('.brandlogo2', {
    slidesPerView: 2,
    spaceBetween: 10,
    loop: true,
    speed: 4500,
    autoplay: { delay: 0, disableOnInteraction: false, reverseDirection: true },
    rtl: true,
    breakpoints: {
      640: { slidesPerView: 2 },
      768: { slidesPerView: 4 },
      1024: { slidesPerView: 6 },
    },
  });

  initSwiper(".tech-sld", {
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 2000,
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".tech-next", prevEl: ".tech-prev" },
  });

  initSwiper(".dmcasestudy-sld", {
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 2000,
    autoplay: { delay: 3000, disableOnInteraction: false },
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".dmcasestudy-next", prevEl: ".dmcasestudy-prev" },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 20 },
      768: { slidesPerView: 2, spaceBetween: 30 },
      1024: { slidesPerView: 3, spaceBetween: 40 },
    },
  });

  initSwiper(".dmreview-sld", {
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 2000,
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".dmreview-next", prevEl: ".dmreview-prev" },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 20 },
      768: { slidesPerView: 2, spaceBetween: 30 },
      1024: { slidesPerView: 2, spaceBetween: 40 },
    },
  });

  initSwiper('.dm-location-sld', {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    speed: 4500,
    autoplay: { delay: 0, disableOnInteraction: false, reverseDirection: false },
    rtl: true,
    breakpoints: {
      640: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    },
  });

  initSwiper(".dmblog-sld", {
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 2000,
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".dmblog-next", prevEl: ".dmblog-prev" },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 20 },
      768: { slidesPerView: 2, spaceBetween: 30 },
      1024: { slidesPerView: 2, spaceBetween: 40 },
    },
  });

  initSwiper(".valuable_client_swiper", {
    breakpoints: {
      0: { slidesPerView: 1, spaceBetween: 10 },
      640: { slidesPerView: 2, spaceBetween: 10 },
      768: { slidesPerView: 3, spaceBetween: 10 },
      1024: { slidesPerView: 3, spaceBetween: 20 }
    },
    loop: true,
    speed: 2000,
    autoplay: { delay: 0, disableOnInteraction: false },
    freeMode: true,
  });

  initSwiper(".whatOurClientsSay_Swiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    navigation: { nextEl: '.swiper-pagination-next-cust', prevEl: '.swiper-pagination-prev-cust' },
  });

  initSwiper(".latestBlogsSwiper", {
    breakpoints: {
      0: { slidesPerView: 1, spaceBetween: 10 },
      640: { slidesPerView: 1, spaceBetween: 10 },
      768: { slidesPerView: 2, spaceBetween: 20 },
      1024: { slidesPerView: 2, spaceBetween: 20 }
    },
    navigation: { nextEl: ".blog_pgn_next", prevEl: ".blog_pgn_prev" }
  });

  initSwiper(".cusswiper_sld", {
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 2000,
    autoplay: { delay: 3000, disableOnInteraction: false, reverseDirection: true },
    loop: true,
    pagination: { el: ".swiper-pagination", clickable: true },
    navigation: { nextEl: ".dmreview-next", prevEl: ".dmreview-prev" },
    breakpoints: {
      640: { slidesPerView: 1, spaceBetween: 20 },
      768: { slidesPerView: 1, spaceBetween: 30 },
      1024: { slidesPerView: 1, spaceBetween: 40 },
    },
  });

  initSwiper(".newteam-sld", {
    slidesPerView: 1,
    centeredSlides: true,
    spaceBetween: 30,
    loop: true,
    speed: 1500,
    autoplay: { delay: 3000, disableOnInteraction: false },
    navigation: { nextEl: ".dmcasestudy-next", prevEl: ".dmcasestudy-prev" },
    breakpoints: {
      640: { slidesPerView: 1.5, spaceBetween: 20 },
      1024: { slidesPerView: 2.5, spaceBetween: 30 },
    },
  });
})();
