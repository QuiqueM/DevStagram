// import "./bootstrap";
import Dropzone from "dropzone";

const dropzone = new Dropzone("#upload-posts", {
    dictDefaultMessage: "Drop files here to upload",
    acceptedFiles: ".jpg, .jpeg, .png, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Remove file",
    maxFiles: 1,
    uploadMultiple: false,
    init: function () {
        if (document.querySelector("#image").value.trim()) {
            const file = {
                name: document.querySelector("#image").value,
                size: 12345,
            };
            this.options.addedfile.call(this, file);
            this.options.thumbnail.call(this, file, `/uploads/${file.name}`);
            file.previewElement.classList.add("dz-success");
            file.previewElement.classList.add("dz-complete");
        }
    },
});

dropzone.on("success", function (file, response) {
    console.log(response);
    document.querySelector("#image").value = response.image;
});

dropzone.on("removedfile", function () {
    document.querySelector("#image").value = "";
});
