document.addEventListener('DOMContentLoaded', function() {
    const subjectSelect = document.getElementById('subject');
    const dynamicFields = document.getElementById('dynamicFields');
    const contactForm = document.getElementById('contactForm');
    const messageDiv = document.getElementById('message');

    subjectSelect.addEventListener('change', function() {
        dynamicFields.innerHTML = '';

        if (this.value === 'wsparcie') {
            dynamicFields.innerHTML = `
                <label for="problemDescription">Opis problemu:</label>
                <textarea id="problemDescription" name="problemDescription" required></textarea>
            `;
        } else if (this.value === 'opinie') {
            dynamicFields.innerHTML = `
                <label for="rating">Ocena (1-5):</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
            `;
        }
    });

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = subjectSelect.value;
        let isValid = true;

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Proszę podać poprawny adres email.');
            isValid = false;
        }

        if (subject === 'opinie') {
            const rating = document.getElementById('rating').value;
            if (rating < 1 || rating > 5) {
                alert('Ocena musi być w zakresie 1-5.');
                isValid = false;
            }
        }

        if (isValid) {
            messageDiv