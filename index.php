<?php
include_once ('header.php');
?>
    <body>
       <div class="wrapper">
           <section class="form signup">
               <header>
                   Mj Chat App
               </header>
               <form action="#" enctype="multipart/form-data">
               <div class="error-txt">
               </div>
               <div class="name-details">
                   <div class="field input">
                       <label>First Name</label>
                       <input type="text" name="fname" placeholder="First Name" required>
                   </div>
                   <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="mail" name="email" placeholder="Enter your mail" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select Image</label>
                        <input type="file" name="image" placeholder="Choose Image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Start chatting">
                    </div> 
               </div>
                </form>
                <div class="link">Already signed up? 
                    <a href="#">Login now</a> 
                </div>
           </section>
       </div> 
       <script src="javascript/pass-show-hide.js"></script>
       <script src="javascript/signup.js"></script>      
    </body>
</html>