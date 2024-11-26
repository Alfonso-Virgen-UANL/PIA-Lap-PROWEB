const crearReseñaBtn = document.getElementById('crearReseñaBtn');
const popupOverlay = document.getElementById('popupOverlay');
const closePopup = document.getElementById('closePopup');
const reviewForm = document.getElementById('reviewForm');

crearReseñaBtn.addEventListener('click', (e) => {
    e.preventDefault();
    popupOverlay.style.display = 'flex';
});

closePopup.addEventListener('click', () => {
    popupOverlay.style.display = 'none';
});

reviewForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const reviewText = document.getElementById('reviewText').value;
    const rating = document.getElementById('rating').value;
    alert(`Reseña enviada:\n"${reviewText}"\nCalificación: ${rating}/10`);
    popupOverlay.style.display = 'none';
    reviewForm.reset();
});