// Accessible Menu Functions


document.addEventListener('DOMContentLoaded', function () {
  // Select all submenu toggle buttons
  const toggles = document.querySelectorAll('.submenu-toggle');

  toggles.forEach(button => {
    const li = button.parentElement;               // parent <li>
    const submenu = li.querySelector('.sub-menu'); // associated <ul>

    if (!submenu) return;

    // Initially hide submenu links from tab order
    const submenuLinks = submenu.querySelectorAll('a');
    submenuLinks.forEach(link => link.setAttribute('tabindex', '-1'));

    // Toggle function
    function toggleMenu() {
      const isOpen = button.getAttribute('aria-expanded') === 'true';
      button.setAttribute('aria-expanded', !isOpen);
      li.classList.toggle('open', !isOpen);

      // Update tabbing for submenu links
      submenuLinks.forEach(link => {
        if (!isOpen) {
          link.setAttribute('tabindex', '0');  // menu just opened
        } else {
          link.setAttribute('tabindex', '-1'); // menu just closed
        }
      });
    }

    // Click activation
    button.addEventListener('click', toggleMenu);

    // Keyboard activation: Enter or Space
    button.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault(); // prevent scrolling for Space
        toggleMenu();
      }
    });

    // Optional hover for mouse users (visual only)
    li.addEventListener('mouseenter', () => li.classList.add('open'));
    li.addEventListener('mouseleave', () => li.classList.remove('open'));
  });

    // Menu Toggle
    const toggle = document.querySelector('#menu-toggle')

    function toggleIsOpen() {
      const currentState = toggle.getAttribute('aria-pressed')
      toggle.setAttribute('aria-pressed', currentState === 'false')
    }

    toggle.addEventListener('click', toggleIsOpen)

});



// External Link cleanup
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a[target="_blank"]').forEach(link => {
        // Add rel
        const rels = new Set((link.getAttribute('rel') || '').split(' ').filter(Boolean));
        rels.add('noopener');
        rels.add('noreferrer');
        link.setAttribute('rel', Array.from(rels).join(' '));

        // Append visually hidden span
        const span = document.createElement('span');
        span.className = 'visually-hidden';
        span.textContent = 'Opens in a new window';
        link.appendChild(span);
    });
});