<?php
   include "../includes/header.php";
   include "../includes/db.php";
 $enter=false;
   ?>
<link rel="stylesheet" href="/affilpro/assets/css/style.min.css">

<body>
    <!-- start code in shyam  Night -->
    <main>
        <section class="form-section" style="margin-top:100px;">
            <div class="container">
                <form action="register.php" method="POST">
                <div class="row">
                        <div class="signUP__formDiv">
                                    <div class="form-div">
                                        <div class="col-md-12">
                                            <div class="signUp__title">
                                                <h2>Enroll to AffilPro</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group1">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input name="name" type="text" class="form-control" placeholder="Name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group1">
                                                <label for="exampleInputPassword1">Email</label>
                                                <div class="pass-div">
                                                    <input name="email" type="email" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group1">
                                                <label for="exampleInputPassword1">Your City</label>
                                                <div class="pass-div">
                                                    <input name="city" type="text" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group1">
                                                    <label for="exampleInputEmail1">Mobile No.</label>
                                                    <input name="phone" type="number" id="" class="form-control" placeholder="+91 |" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group1">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input name="password" type="password" placeholder="" id="" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group1">
                                                <label for="exampleInputEmail1">Enter Referral Code</label>
                                                <span style="float: right; color: blue; display: none" id="">Code Applied Successfully!!</span>
                                                <div class="aff-div">
                                                    <?php
                                                $referal="";
   if(isset($_GET['referal'])){
        $referal=$_GET['referal'];
        echo "<script>
        window.onload = function(){
            document.getElementById('apply_code').click();

        }
        </script>";
   }
   ?>
   
  
                                                    <input  name="sponsorId" id="sponsorId" value="<?php echo $referal?>"type="text" class="form-control" />
                                                    
                                                    
                                                    <button onclick="myFunction()" type="button" id="apply_code">Apply Code</button>

            <script>                               

function myFunction() {
  document.getElementById("sponsorId").disabled = true;
  document.getElementById("sponser").hidden=false;
  id=document.getElementById('sponsorId').value;

<?php
if(!isset($_GET['referal'])){
    $enter=true;
?>
 <?php
}
  $user = "SELECT name FROM `user` WHERE `myrid`='$referal' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)==1){
                foreach($user_run as $user)
                {
                    $sponsor=$user['name'];

                }
            }else{
                if(!$enter){
                $sponsor="Invalid Referal Id";
                }else{
                    $sponsor="Referal Code Applied (Check code properly you cant be able to change it later)";

                }
                
?>
  document.getElementById("sponsorId").disabled = false;

<?php
            }
                    ?>
                }
</script>

<label hidden style="margin-left: 20px;" id="sponser"  for="exampleInputEmail1"><?php echo" $sponsor" ?></label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group1">
                                                <div class="aff-div">
                                                    <label id="spnmobile" class="lbl_msg"></label>
                                                    <input name="sponsorName" id="sponsor" class="lbl_msg" readonly style="border: none; color: green; font-weight: bold;"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="submit-btn">
                            <input type="submit" name="loginUser" value="Submit" class="btn btn-default" />
                        </div>
                    </div>
                                    </div>
                    </div>
                    
                </div>
            </form>
        </div>
        </section>
    </main>
</body>


<?php
   include "../includes/footer.php";
   ?>