document.addEventListener('DOMContentLoaded', function() {
    const userTypeSelect = document.getElementById('userType');
    const nipField = document.getElementById('nipField');
    const emailContainer = document.getElementById('emailContainer');
    const addEmailButton = document.getElementById('addEmail');
    const saveButton = document.getElementById('saveButton');

    userTypeSelect.addEventListener('change', function() {
        if (this.value === 'firma') {
            nipField.style.display = 'block';
        } else {
            nipField.style.display = 'none';
        }
    });

    addEmailButton.addEventListener('click', function() {
        const newEmailField = document.createElement('div');
        newEmailField.classList.add('email-field');
        newEmailField.innerHTML = `
            <input type="email" class="email" required>
            <button type="button" class="removeEmail">Usuń</button>
        `;
        emailContainer.appendChild(newEmailField);

        newEmailField.querySelector('.removeEmail').addEventListener('click', function() {
            emailContainer.removeChild(newEmailField);
        });
    });

    saveButton.addEventListener('click', function() {
        const firstName = document.getElementById('firstName').value;
        const lastName = document.getElementById('lastName').value;
        const age = document.getElementById('age').value;
        const userType = userTypeSelect.value;
        const emails = Array.from(document.querySelectorAll('.email')).map(emailInput => emailInput.value);
        const nip = userType === 'firma' ? document.getElementById('nip').value : undefined;

        const userData = {
            firstName,
            lastName,
            age,
            userType,
            emails,
            nip
        };

        console.log(userData);
    });
});