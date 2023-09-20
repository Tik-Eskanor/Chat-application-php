
const pswrdField = document.querySelectorAll(".form .field input[type='password']");
const toggleBtn = document.querySelectorAll(".form .field i");

for(let i = 0; pswrdField.length > i; i++)
{
 for(let j = 0; toggleBtn.length > j; j++)
 {

    toggleBtn[j].addEventListener('click', function()
    {
        if(pswrdField[i].type == "password")
        {
            pswrdField[i].type = "text";
            toggleBtn[j].classList.add('active');
        }
        else
        {
            pswrdField[i].type = "password";
            toggleBtn[j].classList.remove('active');

        }
    })
  }

}
