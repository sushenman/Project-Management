
document.querySelectorAll('.btn-addCart').forEach(item => {
    item.addEventListener('click', event => {
      console.log('click');
      console.log(event.target);
    })
})


