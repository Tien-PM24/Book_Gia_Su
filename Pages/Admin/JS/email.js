var email=document.querySelector('.fa-envelope');
email.addEventListener('click',function(event){
    event.preventDefault()

    var modal = document.getElementById("email-modal");
  
    // display modal box
    modal.style.display = "block";
})

var close=document.querySelector('#close-btn');

close.addEventListener('click',function(event){
    var email_model=document.querySelector('#email-modal');

    email_model.style.display=('none');

    
})

