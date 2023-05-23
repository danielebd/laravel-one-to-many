import './bootstrap';
import Alpine from 'alpinejs';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

const imageInput = document.querySelector('#image');
const setImage = document.getElementById('switch');
const imageContainer = document.querySelector('.preview');


imageInput.addEventListener('change', showPreview);
setImage.addEventListener('change', function(){
    if(setImage.checked){
        imageContainer.classList.remove('d-none');
        imageContainer.classList.add('d-block');
    } else {
        imageContainer.classList.remove('d-block');
        imageContainer.classList.add('d-none');
    }
});

function showPreview(event) {
    if (event.target.files.length > 0){
        const src = URL.createObjectURL(event.target.files[0]);
        const preview = document.getElementById("file-image-preview");
        preview.src = src;
        preview.style.display = "block";
        console.log('ciao');
    }
}