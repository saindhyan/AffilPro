<?php
include("../includes/header.php");
?>

            <script src="https://www.google.com/recaptcha/api.js"></script> 
                   <div class='main_login_section verify'>
      <div class='container-xl login_row-main' style="max-width:500px; margin-top:200px;">
                <div class='secon_login_mt'>
                    <h2>Verify Certificate</h2>
                 <form action="certificateverify.php" method="post">

                
                    <div class="mb-3 mt_input">
                        <input type="number" name="certinum" class="form-control1" placeholder="C_ |"id="exampleFormControlInput1" placeholder="Enter Certificate Code here"style="margin-top:20px;">
                    </div>
                    <div class="mb-3 mt_input">

                    <div class="g-recaptcha" data-sitekey="6Ld5DBQlAAAAAHC74zOitJK5gNnpcuX3jBDGztR6"></div>
                    </div>

                <button class="_btn_04" name="verify"style="margin-top:20px;"> Verify</button>
            
                </form>
              </div>
          </div>
    
  </div>
  </body>
</html><?php
include("../includes/footer.php");
?>