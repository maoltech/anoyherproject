const form = document.querySelector(".typing-area"),
inputField =form.querySelector(".input-field"), 
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); 
}

sendBtn.onclick = () => {
    let xyz = new XMLHttpRequest();
    xyz.open("POST", "php/insert-chat.php", true);
    xyz.onload = () =>{
        if(xyz.readyState === XMLHttpRequest.DONE){
            if(xyz.status === 200){
                inputField.value = "";
                scrollBottom();
            }
        }
    }
    let formData = new FormData(form);
    xyz.send(formData);
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active")
}

chatBox.onmouseleave = () => {
    chatBox.classList.remove("active")
}


setInterval(() => {
    let xyz = new XMLHttpRequest();
    xyz.open("POST", "php/get-chat.php", true);
    xyz.onload = () =>{
        if(xyz.readyState === XMLHttpRequest.DONE){
            if(xyz.status === 200){
                let data = xyz.response;
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")){
                    scrollBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xyz.send(formData);
},500);

function scrollBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}