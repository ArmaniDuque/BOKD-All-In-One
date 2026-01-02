document.addEventListener('DOMContentLoaded', function() {
    const textInputsAndTextareas = document.querySelectorAll('input[type="text"], textarea');

    textInputsAndTextareas.forEach(element => {
        element.addEventListener('input', function() {
            let value = this.value;
            value = value.replace(/<[^>]*>/g, '');
            value = value.replace(/[<>'"\\;]/g, '');
            this.value = value;
        });
    });
});