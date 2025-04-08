// import 'bootstrap';
import Swiper from 'swiper';
document.addEventListener('DOMContentLoaded', function () {
    const swipers = document.querySelectorAll('.swiper-container');
    swipers.forEach((swiperContainer, index) => {
        new Swiper(swiperContainer, {

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

        });
    });
});
