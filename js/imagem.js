function previewImage(event) {
    var preview = document.getElementById('preview-image');
    var removeBtn = document.getElementById('remove-image');
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
        preview.style.display = 'block';
        removeBtn.style.display = 'block';
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
        removeBtn.style.display = 'none';
    }
}

function removeImage() {
    var preview = document.getElementById('preview-image');
    var removeBtn = document.getElementById('remove-image');
    var fileInput = document.getElementById('imagem');

    preview.src = '';
    preview.style.display = 'none';
    removeBtn.style.display = 'none';
    fileInput.value = null; 
}