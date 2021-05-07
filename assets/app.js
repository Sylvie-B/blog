// recup element
let modal = document.getElementById('modal');
let frame = document.getElementById('frame');
let valid = document.getElementById('validate');

// setting modal window
modal.style.width = innerWidth + "px";
modal.style.height = innerHeight + "px";

frame.style.width = innerWidth / 2 + "px";
frame.style.height = innerHeight / 2 + "px";

// user connexion
valid.addEventListener('click', function (){
    modal.style.display = 'none';
})

