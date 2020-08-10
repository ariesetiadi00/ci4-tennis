function preview() {
  // Ambil Foto Preview
  const fotoPreview = document.querySelector(".foto-preview");
  // Ambil Input Foto
  const foto = document.querySelector("#foto");
  // Ambil Label Foto
  const fotoLabel = document.querySelector(".foto-label");

  fotoLabel.textContent = foto.files[0].name;
  const newPreview = new FileReader();
  newPreview.readAsDataURL(foto.files[0]);

  newPreview.onload = function (e) {
    fotoPreview.src = e.target.result;
  };
}
