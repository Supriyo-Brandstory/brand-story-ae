document.addEventListener('DOMContentLoaded', () => {

  function loadPage(url, addToHistory = true) {
    const content = document.querySelector('#content');
    if (!content) return;

    content.classList.add('fade');

    fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(res => res.text())
      .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newContent = doc.querySelector('#content');
        if (!newContent) return;

        setTimeout(() => {
          content.innerHTML = newContent.innerHTML;
          content.classList.remove('fade');
          if (addToHistory) history.pushState({}, '', url);
          window.scrollTo({ top: 0, behavior: 'smooth' });
        }, 250);
      })
      .catch(err => console.error('SPA navigation error:', err));
  }

  // delegate all link clicks
  document.addEventListener('click', e => {
    const link = e.target.closest('a[href]');
    if (!link) return;

    const url = link.getAttribute('href');
    if (!url) return;

    const isExternal = url.startsWith('http') && !url.includes(window.location.hostname);
    if (isExternal || url.startsWith('#') || url.startsWith('mailto:')) return;

    e.preventDefault();
    console.log('Navigating to', url);
    loadPage(url);
  });

  // browser back/forward
  window.addEventListener('popstate', () => loadPage(location.href, false));
});
