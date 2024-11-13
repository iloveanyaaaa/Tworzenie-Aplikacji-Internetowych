$(document).ready(function () {
    let currentSlide = 0;
    const slideCount = $('.slide').length;
    const slideWidth = $('.slide').width();
    let autoSlide = setInterval(nextSlide, 10000);

    function goToSlide(index) {
        $('.slider').css('transform', 'translateX(' + (-index * slideWidth) + 'px)');
        currentSlide = index;
    }

    function nextSlide() {
        const nextIndex = (currentSlide + 1) % slideCount;
        goToSlide(nextIndex);
    }

    function prevSlide() {
        const prevIndex = (currentSlide - 1 + slideCount) % slideCount;
        goToSlide(prevIndex);
    }

    $('.next').click(function () {
        clearInterval(autoSlide);
        nextSlide();
        autoSlide = setInterval(nextSlide, 10000);
    });

    $('.prev').click(function () {
        clearInterval(autoSlide);
        prevSlide();
        autoSlide = setInterval(nextSlide, 10000);
    });
});
