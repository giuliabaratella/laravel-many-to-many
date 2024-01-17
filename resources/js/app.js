import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);

const buttons = document.querySelectorAll(".cancel-button");

buttons.forEach((button) => {
    button.addEventListener("click", (event)=> {

        event.preventDefault();

        const dataTitle = button.getAttribute("data-item-title");
        const deleteModal = document.getElementById("deleteModal");
        const bootstrapModal = new bootstrap.Modal(deleteModal);

        bootstrapModal.show();

        const title = deleteModal.querySelector("#modal-item-title");
        title.textContent = dataTitle;

        const buttonDelete = deleteModal.querySelector("button.btn-primary");

        buttonDelete.addEventListener('click', ()=>{
            button.parentElement.submit();
        })
    });


});

const previewImage = document.getElementById("image");
previewImage.addEventListener("change", (event)=>{
    const oFReader = new FileReader();
    oFReader.readAsDataURL(previewImage.files[0]);
    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    }
});


