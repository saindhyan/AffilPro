<?php
   include "..\includes/header.php";
   ?><body>
  <div class='main_login_section'><br><br><br><br><br>
      <div class='container-xl login_row-main' style="max-width:500px;">
                <div class='secon_login_mt'>
                    <h2>Login to Affilpro</h2>
                 <form action="login.php" method="post">
                    <div class="mb-3 mt_input">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control1" id="exampleFormControlInput1" placeholder="mail@abc.xyz" requried>
                    </div>
                    <div class="mb-3 mt_input">
                        <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control1" id="exampleFormControlInput1" requried>
                    </div>
     <!--               <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label fw-bolder mb-2" for="flexCheckDefault">
    Remember me
  </label>
</div>-->
                <button class="_btn_04" name="loginUser"> Log In</button>
                
                 <label class="form-check-label fw-bolder mt-2" for="flexCheckDefault">
                 <a href="..\forgot" style="font-size: 14px;">Forget Password </a>
              </label>
                </form>
              </div>
          </div>
    
  </div>
  </body>
</html>

   <?php
   include "..\includes/footer.php";
   ?>