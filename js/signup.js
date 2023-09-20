
const form = document.getElementById("signup-form");
let error = document.querySelector(".error-text");

form.addEventListener('submit', function(e)
{
    e.preventDefault(); //prevent form from submitting

    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/exe/signup.php",true);
    
    xhr.onload = ()=>
    {
      if(xhr.readyState == 4 && xhr.status == 200)
      {
          let response = xhr.response;
          if(response == "successful")
          {
            location.href = "users.php";
          }
          else
          {
            error.textContent = response
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
})



