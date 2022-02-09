<?php
include_once ('header.php');
?>
    <body>
       <div class="wrapper">
           <section class="form login">
               <header>
                   Mj Chat App
               </header>
               <form action="#">
               <div class="error-txt">
               </div>
               <div class="name-details">
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="mail" name="email" placeholder="Enter your mail">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Start chatting">
                    </div> 
               </div>
                </form>
                <div class="link">Not yet signed up? 
                    <a href="#">Signup now</a> 
                </div>
           </section>
       </div> 
       <script src="javascript/pass-show-hide.js"></script>   
       <script src="javascript/login.js"></script>       
    </body>
</html>