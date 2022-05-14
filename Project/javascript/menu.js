const drop = document.querySelector('.drop');
const dropMenu = document.querySelector('.dropdown-menu');
drop.addEventListener('mouseover',showDropdown);
drop.addEventListener('mouseout',disappearDropdown);

function showDropdown(){   
    // console.log('mouseover');
    // console.log('mousdfdfr');
   dropMenu.style.display = 'block';
}

function disappearDropdown(){
    // console.log('mouseout');
    dropMenu.style.display = 'none';
}