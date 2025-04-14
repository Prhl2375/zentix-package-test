document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-add-phone').forEach(function(button) {
        button.addEventListener('click', function() {
            const phoneFieldContainer = this.parentElement;

            const newPhoneField = document.createElement('div');
            newPhoneField.className = 'phone-field';

            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'phones[]';
            newInput.required = true;

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.textContent = '-';
            removeButton.className = 'btn-remove-phone';
            removeButton.addEventListener('click', function() {
                this.parentElement.remove();
            });

            newPhoneField.appendChild(newInput);
            newPhoneField.appendChild(removeButton);

            phoneFieldContainer.parentNode.appendChild(newPhoneField);
        });
    });
});
