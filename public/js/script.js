/* ==========================================================================
   Casa Ulika — shared front-end behaviour
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
  initNavToggle();
  initGalleryLightbox();
  initBookingForm();
});

/* ---------- Mobile navigation ---------- */
function initNavToggle() {
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.main-nav');
  if (!toggle || !nav) return;

  toggle.addEventListener('click', () => {
    const isOpen = nav.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  nav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
    });
  });
}

/* ---------- Gallery: category filter + lightbox ---------- */
function initGalleryLightbox() {
  const grid = document.querySelector('.gallery-grid');
  if (!grid) return;

  const items = Array.from(grid.querySelectorAll('button[data-full]'));
  const filterButtons = document.querySelectorAll('.filter-btn');
  const lightbox = document.querySelector('.lightbox');
  const lightboxImg = lightbox.querySelector('img');
  const lightboxCaption = lightbox.querySelector('figcaption');
  const closeBtn = lightbox.querySelector('.lightbox-close');
  const prevBtn = lightbox.querySelector('.lightbox-prev');
  const nextBtn = lightbox.querySelector('.lightbox-next');

  let visibleItems = items;
  let currentIndex = 0;

  function openLightbox(index) {
    currentIndex = index;
    const item = visibleItems[currentIndex];
    lightboxImg.src = item.dataset.full;
    lightboxImg.alt = item.dataset.alt || '';
    lightboxCaption.textContent = item.dataset.caption || '';
    lightbox.classList.add('is-open');
    lightbox.setAttribute('aria-hidden', 'false');
    closeBtn.focus();
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.remove('is-open');
    lightbox.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  function showRelative(delta) {
    currentIndex = (currentIndex + delta + visibleItems.length) % visibleItems.length;
    openLightbox(currentIndex);
  }

  items.forEach((item) => {
    item.addEventListener('click', () => {
      openLightbox(visibleItems.indexOf(item));
    });
  });

  closeBtn.addEventListener('click', closeLightbox);
  prevBtn.addEventListener('click', () => showRelative(-1));
  nextBtn.addEventListener('click', () => showRelative(1));

  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  document.addEventListener('keydown', (e) => {
    if (!lightbox.classList.contains('is-open')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') showRelative(1);
    if (e.key === 'ArrowLeft') showRelative(-1);
  });

  filterButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      filterButtons.forEach((b) => b.setAttribute('aria-pressed', 'false'));
      btn.setAttribute('aria-pressed', 'true');
      const category = btn.dataset.category;

      items.forEach((item) => {
        const match = category === 'all' || item.dataset.category === category;
        item.parentElement.style.display = match ? '' : 'none';
      });

      visibleItems = items.filter((item) => category === 'all' || item.dataset.category === category);
    });
  });
}

/* ---------- Contact / booking-inquiry form validation ---------- */
function initBookingForm() {
  const form = document.querySelector('.booking-form');
  if (!form) return;

  const feedback = form.querySelector('.form-feedback');

  const validators = {
    name: (v) => v.trim().length >= 2 || 'Please enter your full name.',
    email: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()) || 'Please enter a valid email address.',
    phone: (v) => v.trim() === '' || /^[0-9+()\-\s]{7,}$/.test(v.trim()) || 'Please enter a valid phone number.',
    checkin: (v) => v !== '' || 'Please choose a check-in date.',
    checkout: (v, f) => {
      if (v === '') return 'Please choose a check-out date.';
      const inDate = new Date(f.checkin.value);
      const outDate = new Date(v);
      return outDate > inDate || 'Check-out must be after check-in.';
    },
    guests: (v) => (Number(v) >= 1 && Number(v) <= 8) || 'Guests must be between 1 and 8.',
    message: (v) => v.trim().length <= 600 || 'Message must be 600 characters or fewer.',
  };

  function setFieldState(fieldEl, result) {
    const wrapper = fieldEl.closest('.field');
    const errorEl = wrapper.querySelector('.error-msg');
    if (result === true) {
      wrapper.classList.remove('has-error');
      if (errorEl) errorEl.textContent = '';
    } else {
      wrapper.classList.add('has-error');
      if (errorEl) errorEl.textContent = result;
    }
  }

  Object.keys(validators).forEach((name) => {
    const el = form.elements[name];
    if (!el) return;
    el.addEventListener('blur', () => {
      const result = validators[name](el.value, form);
      setFieldState(el, result);
    });
  });

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let allValid = true;

    Object.keys(validators).forEach((name) => {
      const el = form.elements[name];
      if (!el) return;
      const result = validators[name](el.value, form);
      setFieldState(el, result);
      if (result !== true) allValid = false;
    });

    feedback.classList.remove('success', 'error');

    if (allValid) {
      feedback.textContent = `Thank you, ${form.elements.name.value.split(' ')[0]}. Your enquiry has been received — our front desk will confirm availability by email within 24 hours. (This is a static prototype: no data is sent or stored.)`;
      feedback.classList.add('success', 'is-visible');
      form.reset();
    } else {
      feedback.textContent = 'Please correct the highlighted fields and try again.';
      feedback.classList.add('error', 'is-visible');
    }

    feedback.setAttribute('tabindex', '-1');
    feedback.focus();
  });
}
