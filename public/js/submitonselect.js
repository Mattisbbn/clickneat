const selectButtons = document.querySelectorAll('select');

selectButtons.forEach(selectButton => {
    selectButton.addEventListener('change', () => {
        selectButton.form.submit();
    });
});
