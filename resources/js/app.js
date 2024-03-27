// Default Laravel bootstrapper, installs axios
import "./bootstrap";

// Added: Actual Bootstrap JavaScript dependency
import "bootstrap";

// Added: Popper.js dependency for popover support in Bootstrap
import "@popperjs/core";

let edit_task_modal = document.getElementById("editModal");
let edit_profile_modal = document.getElementById("editAccountModal");

if (edit_task_modal) {
    edit_task_modal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;

        var title = button.getAttribute("data-title");
        var content = button.getAttribute("data-content");
        var status = button.getAttribute("data-status");
        var id = button.getAttribute("data-id");
        document.getElementById("update_title").value = title;
        document.getElementById("update_content").value = content;
        document.getElementById("update_status").value = status;
        document.getElementById("update_id").value = id;
    });
}

if (edit_profile_modal) {
    edit_profile_modal.addEventListener("show.bs.modal", function (event) {
        console.log("hello");
        var button = event.relatedTarget;

        var id = button.getAttribute("data-id");
        var name = button.getAttribute("data-name");
        var email = button.getAttribute("data-email");
        document.getElementById("update_name").value = name;
        document.getElementById("update_email").value = email;
        document.getElementById("update_id").value = id;
    });
}
