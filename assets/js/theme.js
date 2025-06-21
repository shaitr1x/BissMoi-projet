const toggle = document.getElementById('theme-toggle');
const themeLink = document.getElementById('theme-link');

if (localStorage.getItem('theme') === 'dark') {
  themeLink.href = '../assets/css/dark.css';
  toggle.checked = true;
}

toggle.addEventListener('change', () => {
  if (toggle.checked) {
    themeLink.href = '../assets/css/dark.css';
    localStorage.setItem('theme', 'dark');
  } else {
    themeLink.href = '../assets/css/index.css';
    localStorage.setItem('theme', 'light');
  }
});
