let currentSlide = 0;

function showSlide(index) {
  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');

  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(${(i - index) * 100}%)`;
  });

  dots.forEach((dot, i) => {
    dot.classList.toggle('active', i === index);
  });
}

function nextSlide() {
  currentSlide = (currentSlide + 1) % document.querySelectorAll('.slide').length;
  showSlide(currentSlide);
}

function prevSlide() {
  currentSlide = (currentSlide - 1 + document.querySelectorAll('.slide').length) % document.querySelectorAll('.slide').length;
  showSlide(currentSlide);
}

document.addEventListener('DOMContentLoaded', () => {
  showSlide(currentSlide);
});