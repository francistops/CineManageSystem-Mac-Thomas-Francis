document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star-rating .star');
    const noteInput = document.getElementById('note');
    const form = document.querySelector('form');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = parseInt(this.dataset.value);
            noteInput.value = rating;

            stars.forEach(s => {
                s.classList.toggle('active', parseInt(s.dataset.value) <= rating);
            });
        });

        star.addEventListener('mouseover', function () {
            const hoverValue = parseInt(this.dataset.value);
            stars.forEach(s => {
                s.classList.toggle('hover', parseInt(s.dataset.value) <= hoverValue);
            });
        });

        star.addEventListener('mouseout', function () {
            stars.forEach(s => s.classList.remove('hover'));
        });
    });

    
    form.addEventListener('submit', function (e) {
        if (parseInt(noteInput.value) === 0) {
            e.preventDefault();
            alert("Veuillez sélectionner une note avant de soumettre votre évaluation.");
        }
    });
});


