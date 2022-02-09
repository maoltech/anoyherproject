const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users  .search button"),
userList = document.querySelector(".users  .user-list");

searchBtn.onclick = () =>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

setInterval(() => {
        let xyz = new XMLHttpRequest();
        xyz.open("GET", "php/user.php", true);
        xyz.onload = () =>{
            if(xyz.readyState === XMLHttpRequest.DONE){
                if(xyz.status === 200){
                    let data = xyz.response;
                    userList.innerHTML = data;
                }
            }
        }
        xyz.send();
    },500);