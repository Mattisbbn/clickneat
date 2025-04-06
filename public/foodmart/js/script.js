(function() {
    "use strict";

    var initPreloader = function() {
      document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('preloader-site');
      });

      window.addEventListener('load', function() {
        var preloader = document.querySelector('.preloader-wrapper');
        if (preloader) {
          preloader.style.display = 'none';
        }
        document.body.classList.remove('preloader-site');
      });
    };

    var initChocolat = function() {
      if (typeof Chocolat !== 'undefined') {
        Chocolat(document.querySelectorAll('.image-link'), {
          imageSize: 'contain',
          loop: true,
        });
      }
    };

    var initSwiper = function() {
      if (typeof Swiper !== 'undefined') {
        new Swiper(".main-swiper", {
          speed: 500,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });

        new Swiper(".category-carousel", {
          slidesPerView: 6,
          spaceBetween: 30,
          speed: 500,
          navigation: {
            nextEl: ".category-carousel-next",
            prevEl: ".category-carousel-prev",
          },
          breakpoints: {
            0: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            991: { slidesPerView: 4 },
            1500: { slidesPerView: 6 },
          }
        });

        new Swiper(".brand-carousel", {
          slidesPerView: 4,
          spaceBetween: 30,
          speed: 500,
          navigation: {
            nextEl: ".brand-carousel-next",
            prevEl: ".brand-carousel-prev",
          },
          breakpoints: {
            0: { slidesPerView: 2 },
            768: { slidesPerView: 2 },
            991: { slidesPerView: 3 },
            1500: { slidesPerView: 4 },
          }
        });

        new Swiper(".products-carousel", {
          slidesPerView: 5,
          spaceBetween: 30,
          speed: 500,
          navigation: {
            nextEl: ".products-carousel-next",
            prevEl: ".products-carousel-prev",
          },
          breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 3 },
            991: { slidesPerView: 4 },
            1500: { slidesPerView: 6 },
          }
        });
      }
    };

    var initProductQty = function() {
      document.querySelectorAll('.product-qty').forEach(function(elProduct) {
        var quantityInput = elProduct.querySelector('#quantity');
        if (!quantityInput) return;

        elProduct.querySelector('.quantity-right-plus')?.addEventListener('click', function(e) {
          e.preventDefault();
          var quantity = parseInt(quantityInput.value) || 0;
          quantityInput.value = quantity + 1;
        });

        elProduct.querySelector('.quantity-left-minus')?.addEventListener('click', function(e) {
          e.preventDefault();
          var quantity = parseInt(quantityInput.value) || 0;
          if (quantity > 0) {
            quantityInput.value = quantity - 1;
          }
        });
      });
    };

    var initJarallax = function() {
      if (typeof jarallax !== 'undefined') {
        jarallax(document.querySelectorAll(".jarallax"));
        jarallax(document.querySelectorAll(".jarallax-keep-img"), {
          keepImg: true,
        });
      }
    };

    // Document ready equivalent
    document.addEventListener('DOMContentLoaded', function() {
      initPreloader();
      initSwiper();
      initProductQty();
      initJarallax();
      initChocolat();
    });

  })();
