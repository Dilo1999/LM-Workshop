/**
 * Horizontal industry card slider for mobile viewports.
 */
function initIndustrySliders() {
  const sliders = document.querySelectorAll('[data-industry-slider]');

  sliders.forEach((slider) => {
    const dotsWrap = slider.parentElement?.querySelector('[data-industry-slider-dots]');
    if (!dotsWrap) return;

    const slides = slider.querySelectorAll('.industry-slider__slide');
    const dots = dotsWrap.querySelectorAll('[data-industry-slider-dot]');
    if (!slides.length || !dots.length) return;

    let activeIndex = 0;

    const setActive = (index) => {
      activeIndex = index;
      dots.forEach((dot, i) => {
        dot.classList.toggle('is-active', i === index);
      });
    };

    const scrollToIndex = (index) => {
      const slide = slides[index];
      if (!slide) return;

      const offset = slide.offsetLeft - slider.offsetLeft - (slider.clientWidth - slide.clientWidth) / 2;
      slider.scrollTo({ left: offset, behavior: 'smooth' });
      setActive(index);
    };

    dots.forEach((dot) => {
      dot.addEventListener('click', () => {
        const index = Number(dot.getAttribute('data-industry-slider-dot'));
        if (!Number.isNaN(index)) scrollToIndex(index);
      });
    });

    let scrollTimer;
    slider.addEventListener(
      'scroll',
      () => {
        window.clearTimeout(scrollTimer);
        scrollTimer = window.setTimeout(() => {
          const center = slider.scrollLeft + slider.clientWidth / 2;
          let nearest = 0;
          let nearestDistance = Infinity;

          slides.forEach((slide, index) => {
            const slideCenter = slide.offsetLeft - slider.offsetLeft + slide.clientWidth / 2;
            const distance = Math.abs(center - slideCenter);
            if (distance < nearestDistance) {
              nearestDistance = distance;
              nearest = index;
            }
          });

          if (nearest !== activeIndex) setActive(nearest);
        }, 80);
      },
      { passive: true }
    );
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initIndustrySliders);
} else {
  initIndustrySliders();
}
