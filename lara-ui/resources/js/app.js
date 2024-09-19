import "./bootstrap";
import Swal from "sweetalert2";
import "animate.css";

let modalControl = document.getElementById("modalControl");
let confirmBtn = document.getElementById("confirmBtn");

modalControl.addEventListener("click", function () {
    let modal1 = document.getElementById("my_modal_1");
    modal1.showModal();
});

confirmBtn.addEventListener("click", () => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                },
            });
            Toast.fire({
                icon: "success",
                title: "Signed in successfully",
            });
        } else {
            console.log(false);
        }
    });
});
