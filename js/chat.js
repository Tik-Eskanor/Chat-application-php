
let form = document.querySelector(".typing-area");
let inputField = document.querySelector(".input-field");
let chatBox = document.querySelector('.chat-box');


form.addEventListener('submit',function(e)
{
  e.preventDefault();

  let xhr = new XMLHttpRequest();
  xhr.open("POST","php/exe/insert_chat.php");
  xhr.onload =()=>
  {
    if(xhr.readyState == 4 && xhr.status == 200)
    {
      let response = xhr.response;
      if(response == "successful")
      {
        inputField.value = "";
      }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
})


setInterval(()=>
{
  let xhr = new XMLHttpRequest();
  xhr.open('POST','php/exe/get_chat.php',true);
  xhr.onload =()=>
  {
     if(xhr.readyState == 4 && xhr.status == 200)
     {
       let data = xhr.response;
       chatBox.innerHTML = data;
       if(!chatBox.classList.contains('active'))
       {
          scrollToBottom()
       }
     }
  }
  let formData = new FormData(form);
  xhr.send(formData);
},500);

function scrollToBottom()
{
  chatBox.scrollTop = chatBox.scrollHeight;
}

chatBox.onmouseenter = ()=>
{
   chatBox.classList.add('active');
}
chatBox.onmouseleave = ()=>
{
   chatBox.classList.remove('active');
}