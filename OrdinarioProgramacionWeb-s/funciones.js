function preview(e) {
    console.log(e.target.files);
    const url = e.target.files[0];
    console.log(url);
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `
    <button class="btn btn-danger" onclick="deleteImg(event)"> <i class="fas fa-times"></i> </button>`;
}

function deleteImg(e) {
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src = '';
}