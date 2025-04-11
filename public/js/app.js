console.log(" 🚀 hello");
// Wait until DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM is ready");

    const modal = document.getElementById("animal-modal");
    const descriptionBox = document.getElementById("modal-description");
    //const closeBtn = modal.querySelector('a');

    // Debugging logs
    //console.log("trigger:", trigger);
    //console.log("modal:", modal);
    //console.log("closeBtn:", closeBtn);

document.querySelectorAll(".open-modal").forEach(button => {
    button.addEventListener("click", (e) =>{
        e.preventDefault();
        const desc = button.getAttribute("data-description");
        descriptionBox.textContent = desc || "Pas de description disponible";
        modal.classList.add("show");
    });
});

//close modal
    document.querySelector(".close-modal").addEventListener('click',() => {
        modal.classList.remove("show");
    });
// Close with ESC
    document.addEventListener("keydown", (e) => {
        if(e.key === escape) {
            modal.classList.remove("show");
        }
    })


});
    //Open modal and set description
    /*if (trigger && modal) {
        trigger.addEventListener("click", (e) => {
            e.preventDefault();
            modal.style.display = "block";
            console.log("Modal opened");
        });

        closeBtn.addEventListener("click", (e) => {
            e.preventDefault();
            modal.style.display = "none";
            console.log("Modal closed");
        });
    }*/



