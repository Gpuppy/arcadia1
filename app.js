document.querySelectorAll('.modal').forEach(modal => {
    modal.addEventListener('click', () => {
        console.log("Modal clicked:", modal.id);
})

});