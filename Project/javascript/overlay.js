const slide = document.querySelector('.overlay');
const ham = document.querySelector('.hamburger');

ham.addEventListener('click',slideDiv);

function slideDiv(){
    document.querySelector('.nav').classList.toggle('change');
    document.querySelector('.hamburger').classList.toggle('change');
}
