/**
 * LM Workshop navigation: scroll styling + mobile menu.
 */
function initNav() {
  const nav = document.querySelector('[data-nav]');
  const toggleBtn = document.querySelector('[data-mobile-menu-toggle]');
  const panel = document.querySelector('[data-mobile-menu-panel]');

  if (nav) {
    const onScroll = () => {
      const scrolled = window.scrollY > 40;
      nav.classList.toggle('border-gold/18', scrolled);
      nav.classList.toggle('border-transparent', !scrolled);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  if (!toggleBtn || !panel) return;

  const iconOpen = toggleBtn.querySelector('[data-mobile-menu-icon="open"]');
  const iconClose = toggleBtn.querySelector('[data-mobile-menu-icon="close"]');
  const closeLinks = panel.querySelectorAll('[data-mobile-menu-close]');

  function setOpen(isOpen) {
    toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    panel.classList.toggle('hidden', !isOpen);
    if (iconOpen) iconOpen.classList.toggle('hidden', isOpen);
    if (iconClose) iconClose.classList.toggle('hidden', !isOpen);
    document.body.classList.toggle('overflow-hidden', isOpen);
  }

  toggleBtn.addEventListener('click', () => {
    setOpen(toggleBtn.getAttribute('aria-expanded') !== 'true');
  });

  closeLinks.forEach((link) => {
    link.addEventListener('click', () => setOpen(false));
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && toggleBtn.getAttribute('aria-expanded') === 'true') {
      setOpen(false);
    }
  });
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initNav);
} else {
  initNav();
}
