const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); 
}
 
continueBtn.onclick = () => {
    let xyz = new XMLHttpRequest();
    xyz.open("POST", "php/login.php", true);
    xyz.onload = () =>{
        if(xyz.readyState === XMLHttpRequest.DONE){
            if(xyz.status === 200){
                let data = xyz.response;
                if (data ==  "success login"){
                    location.href = "user.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xyz.send(formData);
}