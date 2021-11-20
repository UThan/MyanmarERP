require("./bootstrap.js");
import Swal from "sweetalert2/src/sweetalert2.js";

var Turbolinks = require("turbolinks");
Turbolinks.start();

window.addEventListener("onModalOpen", (e) => {
    $(e.detail.name).modal("show");
});

window.addEventListener("onModalClose", (e) => {
    $(e.detail.name).modal("hide");
});

window.addEventListener("confirmDelete", (e) => {
    Swal.fire({
        text: "Do you want to delete?",
        confirmButtonText: "Confirm",
        showCancelButton: true,
        cancelButtonText: "Cancle",
        confirmButtonColor: "#dc3545",
        width: "20rem",
    }).then((result) => {
        if (result.isConfirmed) {
            console.log(e.detail.id);
            Livewire.emit("onDelete", e.detail.id);
        }
    });
});
