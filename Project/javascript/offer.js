const off = document.querySelectorAll('.offer');

for(let index = 0; index< off.length;index++){
    if(off[index].innerHTML == '$0 Off'){
        // console.log('sdfjk');
        off[index].style.display = 'none';
    }
}
