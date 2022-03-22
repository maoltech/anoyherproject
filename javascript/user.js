const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
userList = document.querySelector(".users .user-list");

searchBtn.onclick = () =>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value ="";
}

searchBar.onkeyup = () =>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
        let xyz = new XMLHttpRequest();
        xyz.open("POST", "php/search.php", true);
        xyz.onload = () =>{
            if(xyz.readyState === XMLHttpRequest.DONE){
                if(xyz.status === 200){
                    let data = xyz.response;
                    userList.innerHTML = data;
                    console.log('hello');
                }
            }
        }
        xyz.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xyz.send("searchTerm=" + searchTerm);
    }



setInterval(() => {
        let xyz = new XMLHttpRequest();
        xyz.open("GET", "php/user.php", true);
        xyz.onload = () =>{
            if(xyz.readyState === XMLHttpRequest.DONE){
                if(xyz.status === 200){
                    let data = xyz.response;
                    if (!searchBar.classList.contains("active")){
                        userList.innerHTML = data;
                    }
                    
                }
            }
        }
        xyz.send();
    },500);