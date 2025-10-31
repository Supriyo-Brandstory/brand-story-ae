var swiper=new Swiper(".resproSlider",{spaceBetween:10,slidesPerView:1,freeMode:!0,watchSlidesProgress:!0,breakpoints:{767:{slidesPerView:1},1080:{slidesPerView:1},1200:{slidesPerView:1}}});var swiper2=new Swiper(".resproSlider1",{spaceBetween:10,autoHeight:!0,navigation:{nextEl:".respro-nxt",prevEl:".respro-pre",},thumbs:{swiper:swiper,},});var swiper=new Swiper(".testmonial-slider",{slidesPerView:"1",autoplay:{delay:4000,},breakpoints:{767:{slidesPerView:1},1200:{slidesPerView:1}}});var swiper=new Swiper(".newtestSwiper",{slidesPerView:1,spaceBetween:10,pagination:{el:".swiper-pagination",clickable:!0,},breakpoints:{640:{slidesPerView:1,spaceBetween:20,},768:{slidesPerView:2,spaceBetween:20,},1024:{slidesPerView:3,spaceBetween:20,},},})
var swiper = new Swiper(".testiuxSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
        },
      },
});


var swiper = new Swiper(".bblogSwiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

var swiper = new Swiper(".caseSwiper", {
  slidesPerView: 1,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
});


var swiper = new Swiper(".whatOurClientSaySwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
  },
});


// location-slider of map
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Swiper
    var swiper = new Swiper(".location-slider", {
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 1.5 },
            1024: { slidesPerView: 2.4 }
        }
    });

    // Get all location markers
    const markers = document.querySelectorAll(".location-marker");
const slides = document.querySelectorAll(".location-slider .swiper-slide");
    // Add click event to each marker
    markers.forEach(marker => {
        marker.addEventListener("click", function() {
            // Get slide index from data attribute
            const slideIndex = parseInt(this.getAttribute("data-slide"));
            
            // Remove active class from all markers
            markers.forEach(m => m.classList.remove("active"));
            
            // Add active class to clicked marker
            this.classList.add("active");
             // Remove 'active' class from all slides
    slides.forEach(slide => slide.classList.remove("active"));

    // Add 'active' class to the correct slide
    slides[slideIndex].classList.add("active");
            
            // Slide to the corresponding slide
            swiper.slideTo(slideIndex);
        });
    });

    // Update active marker when swiper slides (optional)
    swiper.on('slideChange', function() {
        const activeIndex = swiper.activeIndex;
        markers.forEach(marker => {
            marker.classList.remove("active");
            if(parseInt(marker.getAttribute("data-slide")) === activeIndex) {
                marker.classList.add("active");
            }
        });
    });
});

// location-slider-script-ends


document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelectorAll('.swiper-slide').length > 0) {
    if (!window.mySwiper) {
      window.mySwiper = new Swiper(".dmagency-banner-sld", {
        slidesPerView: 1,
        speed: 1000,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".dmagency-pagi",
          clickable: true,
        },
      });
    }
  }
});



var swiper = new Swiper('.brandlogo2', {
  slidesPerView: 2,
  spaceBetween: 10,
  loop: true,
  speed: 4500,  // Adjust speed for smooth scrolling
  autoplay: {
      delay: 0,
      disableOnInteraction: false,
      reverseDirection: true, // Reverse autoplay direction
  },
  rtl: true, // Enables right-to-left mode (slides move from left to right)
  breakpoints: {
      640: {
          slidesPerView: 2,
      },
      768: {
          slidesPerView: 4,
      },
      1024: {
          slidesPerView: 6,
      },
  },
});



var swiper = new Swiper(".tech-sld", {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 2000,  // Adjust speed for smooth scrolling
  // autoplay: {
  //     delay: 3000,
  //     disableOnInteraction: false,
  // },
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".tech-next",
    prevEl: ".tech-prev",
  },
});

var swiper = new Swiper(".dmcasestudy-sld", {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 2000,  // Adjust speed for smooth scrolling
  autoplay: {
      delay: 3000,
      disableOnInteraction: false,
  },
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".dmcasestudy-next",
    prevEl: ".dmcasestudy-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
  },
});


var swiper = new Swiper(".dmreview-sld", {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 2000,  // Adjust speed for smooth scrolling
  // autoplay: {
  //     delay: 3000,
  //     disableOnInteraction: false,
  // },
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".dmreview-next",
    prevEl: ".dmreview-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
  },
});


var swiper = new Swiper('.dm-location-sld', {
  slidesPerView: 1,
  spaceBetween: 24,
  loop: true,
  speed: 4500,  // Adjust speed for smooth scrolling
  autoplay: {
      delay: 0,
      disableOnInteraction: false,
      reverseDirection: false, 
  },
  rtl: true, // Enables right-to-left mode (slides move from left to right)
  breakpoints: {
      640: {
          slidesPerView: 1,
      },
      768: {
          slidesPerView: 2,
      },
      1024: {
          slidesPerView: 3,
      },
  },
});


var swiper = new Swiper(".dmblog-sld", {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 2000,  // Adjust speed for smooth scrolling
  // autoplay: {
  //     delay: 3000,
  //     disableOnInteraction: false,
  // },
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".dmblog-next",
    prevEl: ".dmblog-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
  },
});
// Digital marketing agency in dubai page end


// Social_Media_Marketing_UAE ~ START
// valuable_client_swiper in social-media-marketing-uae _ page
var valuable_client_swiper = new Swiper(".valuable_client_swiper", {
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 10
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20
    }
  },
  loop: true,
  speed: 2000,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  freeMode: true,
})

var whatOurClientsSay_Swiper = new Swiper(".whatOurClientsSay_Swiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper-pagination-next-cust',
    prevEl: '.swiper-pagination-prev-cust'
  },
})

var latestBlogsSwiper = new Swiper(".latestBlogsSwiper", {
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 20
    }
  },
  navigation: {
    nextEl: ".blog_pgn_next",
    prevEl: ".blog_pgn_prev"
  }
})
// Social_Media_Marketing_UAE ~ END





var swiper = new Swiper(".cusswiper_sld", {
  slidesPerView: 1,
  spaceBetween: 20,
  speed: 2000,  // Adjust speed for smooth scrolling
  autoplay: {
      delay: 3000,
      disableOnInteraction: false,
      reverseDirection: true,
  },
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".dmreview-next",
    prevEl: ".dmreview-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 40,
    },
  },
});




var swiper = new Swiper(".newteam-sld", {
  slidesPerView: 1, // show center + parts of side slides
  centeredSlides: true,
  spaceBetween: 30,
  loop: true,
  speed: 1500,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".dmcasestudy-next",
    prevEl: ".dmcasestudy-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 1.5,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 2.5,
      spaceBetween: 30,
    },

  },
});
