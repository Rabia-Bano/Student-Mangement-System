const carouselInner = document.querySelector('.carousel-inner');
const carouselItems = document.querySelectorAll('.carousel-inner img');
let currentIndex = 0;

function autoScroll() {
    currentIndex++;
    if (currentIndex >= carouselItems.length) {
        currentIndex = 0;
    }
    carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
}

setInterval(autoScroll, 3000); // Change the image every 3 seconds
