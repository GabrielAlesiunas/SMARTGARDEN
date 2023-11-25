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

const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav-menu');

/*===== MENU SHOW =====*/

if (navToggle && navMenu) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu');
    });
}

/*===== MENU HIDDEN =====*/
/* Validate if constant exists */
const navClose = document.getElementById('nav-close');
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu')
    })
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction() {
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))


document.addEventListener('DOMContentLoaded', function () {
    const isDarkMode = localStorage.getItem('darkMode') === 'enabled';
  
    if (isDarkMode) {
        document.body.classList.add('dark-theme');
    }
  
    const themeButton = document.getElementById('theme-button');
    if (themeButton) {
        themeButton.className = isDarkMode ? 'ri-sun-line change-theme' : 'ri-moon-line change-theme';
  
        themeButton.addEventListener('click', function () {
            document.body.classList.toggle('dark-theme');
  
            themeButton.className = document.body.classList.contains('dark-theme') ?
                'ri-sun-line change-theme' : 'ri-moon-line change-theme';
  
            localStorage.setItem('darkMode', document.body.classList.contains('dark-theme') ? 'enabled' : 'disabled');
        });
    }
  });