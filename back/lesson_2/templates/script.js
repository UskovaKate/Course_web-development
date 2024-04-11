const showMoreButton = document.querySelector('.btn-show-more');
const showMoreContent = document.querySelector('.show-more-content');

showMoreButton.addEventListener('click', () => {
  if (showMoreContent.style.display === 'none') {
    showMoreContent.style.display = 'block';
    showMoreButton.textContent = 'Скрыть информацию';
  } else {
    showMoreContent.style.display = 'none';
    showMoreButton.textContent = 'Больше информации';
  }
});
