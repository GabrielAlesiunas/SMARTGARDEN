document.getElementById('profile-image-upload').addEventListener('change', function (e) {
    const imageFile = e.target.files[0];
    if (imageFile) {
        const imageUrl = URL.createObjectURL(imageFile);
        document.querySelector('.profile-image-container img').src = imageUrl;
    }
});


document.getElementById('save-profile-button').addEventListener('click', function () {
    var form = document.getElementById('profile-image-form');
    
    var input = document.getElementById('profile-image-upload');
    
    if (input.files.length > 0) {
        var formData = new FormData(form);
        fetch('upload_imagem.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    } else {
        alert('Nenhuma imagem selecionada.');
    }
});


document.querySelector('.profile-image-upload-button').addEventListener('click', function (event) {
    if (event.target !== document.getElementById('profile-image-upload')) {
        document.getElementById('profile-image-upload').click();
    }
});

document.getElementById('profile-image-upload').addEventListener('change', function () {
    document.getElementById('save-profile-button').style.display = 'block';
});

document.getElementById('save-profile-button').addEventListener('click', function () {
    var form = document.getElementById('profile-image-form');
    var input = document.getElementById('profile-image-upload');
    if (input.files.length > 0) {
        form.submit();
    } else {
        alert('Nenhuma imagem selecionada.');
    }
});