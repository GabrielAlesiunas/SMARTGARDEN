document.getElementById('profile-image-upload').addEventListener('change', function (e) {
    const imageFile = e.target.files[0];
    if (imageFile) {
        const imageUrl = URL.createObjectURL(imageFile);
        document.querySelector('.profile-image-container img').src = imageUrl;
    }
});