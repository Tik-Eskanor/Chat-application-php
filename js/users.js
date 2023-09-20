
const  searchBar = document.querySelector(".users .search input");
let searchBtn = document.querySelector(".users .search button");
let userList = document.querySelector('.users-list');

 searchBtn.addEventListener('click', function()
 {
     searchBar.classList.toggle('active');
     searchBtn.classList.toggle('active');
 })

 
 searchBar.addEventListener('keyup',function()
 {

     let value = searchBar.value;
     if(value != "")
     {
         searchBar.classList.add('active');
     }
     else
     {
        searchBar.classList.remove('active');
     }
     let term = 'term='+value;
     
     let xhr = new XMLHttpRequest();
     xhr.open("POST","php/exe/search.php",true);
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

     xhr.onload = ()=>
     {
         if(xhr.readyState == 4 && xhr.status == 200)
         {
             let data  = xhr.response;
            userList.innerHTML = data;
         }
     }
     xhr.send(term);
 });
   

 setInterval(function()
 {

    let xhr = new XMLHttpRequest();
    xhr.open("GET","php/exe/users.php",true);
    xhr.onload =()=>
    {
       if(xhr.readyState == 4 && xhr.status == 200)
       {
           let data = xhr.response;
           if(!searchBar.classList.contains('active'))
           {
              userList.innerHTML = data;
           }
       }
    }
    xhr.send();
 }, 500);

 