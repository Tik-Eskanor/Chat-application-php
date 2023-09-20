
const form = document.getElementById("login-form");
let err = document.querySelector(".error-txt");
// console.log(form)
form.addEventListener("submit",function(e){
    e.preventDefault();

    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/exe/login.php",true);
    xhr.onload = ()=>
    {
       if(xhr.readyState === 4 && xhr.status === 200)
       {
            let response = xhr.response;
            if(response == "successful")
            {
                location.href = "users.php";
            }
            else
            {
                 err.textContent = response;
            }
       }

    }
    let formData = new FormData(form);
    xhr.send(formData);
})
