
const slide = document.querySelector('.slide');
const ham = document.querySelector('.hamburger');
//ham.classList.toggle('slide');
ham.addEventListener('click',slideDiv);
const hidden = document.querySelector('.hidden-nav');

// function slideDiv(){
//     console.log('sliding');
//     slide.style.display = "block";
//     hidden.style.display = "block";
//     slide.style.backgroundColor = "red";
//     document.querySelector('.hamburger').innerHTML = '<i class="fa-solid fa-xmark" width="100px"></i>';
// }

function slideDiv(){
    console.log('clicked');
    document.querySelector('.slide').classList.toggle('change');
}
