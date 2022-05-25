const btnSelect = document.querySelectorAll('.time');

let nowDate = new Date();
let val = nowDate.getDay();

if(val == 6){
    btnSelect[0].style.backgroundColor = 'red';
    btnSelect[1].style.backgroundColor = 'red';
    btnSelect[2].style.backgroundColor = 'red';
    
}else if(val == 0){
    btnSelect[0].style.backgroundColor = 'red';
    btnSelect[1].style.backgroundColor = 'red';
    btnSelect[2].style.backgroundColor = 'red';

}else if(val == 1){
    btnSelect[0].style.backgroundColor = 'red';
    btnSelect[1].style.backgroundColor = 'red';
    btnSelect[2].style.backgroundColor = 'red';
   
}else if(val == 2){
    btnSelect[0].style.backgroundColor = 'green';
    btnSelect[1].style.backgroundColor = 'red';
    btnSelect[2].style.backgroundColor = 'red';
}else if(val == 3){
    btnSelect[0].style.backgroundColor = 'green';
    btnSelect[1].style.backgroundColor = 'green';
    btnSelect[2].style.backgroundColor = 'red';
}else if(val == 4){
    btnSelect[0].style.backgroundColor = 'red';
    btnSelect[1].style.backgroundColor = 'green';
    btnSelect[2].style.backgroundColor = 'green';
}else if(val == 5){
    btnSelect[0].style.backgroundColor = 'red';
    btnSelect[1].style.backgroundColor = 'red';
    btnSelect[2].style.backgroundColor = 'green';
}






