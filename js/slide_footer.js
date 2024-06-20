const slider = document.querySelector('.slider');
const images = document.querySelectorAll('.slider img');
const sliderContainer = document.querySelector('.slider-container');

let currentIndex = 0;
const numImages = images.length;

function nextSlide() {
    currentIndex++;
    if (currentIndex >= numImages) {
        currentIndex = 0;
    }
    updateSlider();
}

function updateSlider() {
    const translateX = -currentIndex * (100 / 4); // 4 images à la fois
    slider.style.transform = `translateX(${translateX}%)`;
}

function initSlider() {
    setInterval(nextSlide, 3000); // Défilement automatique toutes les 3 secondes
}

// Cloner les images pour l'effet de boucle
images.forEach((image, index) => {
    const clone = image.cloneNode(true);
    slider.appendChild(clone);
});

initSlider();