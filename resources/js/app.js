// Default Laravel bootstrapper, installs axios
import "./bootstrap";

// Added: Actual Bootstrap JavaScript dependency
import "bootstrap";

// Added: Popper.js dependency for popover support in Bootstrap
import "@popperjs/core";

document
    .getElementById("editModal")
    .addEventListener("show.bs.modal", function (event) {
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
