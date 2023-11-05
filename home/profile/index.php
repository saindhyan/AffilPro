<?php include "../includes/header.php";
include "../includes/db.php";
?>
<script>

function mycopy() {
  // Get the text field
  var copyText = document.getElementById("referalLink");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied");
}
</script>
  <?php
  if(isset($_SESSION['uid']))
        {
        
            $u_id=$_SESSION['uid'];
            $user = "SELECT * FROM `user` WHERE `uid`='$u_id' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)>0){
                foreach($user_run as $user)
                {
                    ?>
                   

<div id="content">
        <div class="container-fluid">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page-header start -->
                                        <div class="page-wrapper">
                                            <!-- Page-header start -->
                                            <div class="page-header">
                                                <div class="row align-items-end">
                                                    <div class="col-lg-8">
                                                        <div class="page-header-title">
                                                            <button type="button" id="sidebarCollapse"
                                                                class="btn navbar-btn">
                                                                <i class="glyphicon glyphicon-align-left"></i>
                                                                &nbsp;
                                                                <span></span>
                                                            </button>
                                                            <div class="d-inline">
                                                            <h4>My Profile</h4>
                                                            <span>Update your profile image</span>
                                                        </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                                                         
                                        <!-- Page-header end -->
                                        <!-- Page body start -->
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!-- Basic Form Inputs card start -->
                                                 <form action="updateprofile.php" method="POST" enctype="multipart/form-data">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <h4 class="sub-title">Change Profile Image</h4>
                                                            <div class="row m-b-20">
                                                                <span id="" style="margin-left: auto; margin-right: auto; display: block; color: green;"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-6">
                                                                    <label class="col-form-label">Select Image File</label>
                                                                    <input type="file" name="file" id="" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="" id="" />
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div class="explore__moreBTN">
                                                                    <input type="submit" name="submit" value="Update Profile Image" class="btn"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                    <!-- Main-body start -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- Page-header start -->
                            <div class="page-header">
                                <div class="row align-items-end">
                                    <div class="col-lg-8">
                                        <div class="page-header-title">
                                            
                                            <div class="d-inline">
                                                            <span>Update your Personal Information</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3 mt-4">
                                <div class="form-icon position-relative">
                                    <input name="referallink" id="referalLink" type="text" class="form-control ps-5" placeholder="Address :" disabled="disabled" value="http://localhost/affilpro/register/?rid=<?php echo $user['myrid']; ?>">
                                </div>
                            </div>
                            <div class="mt-md-4 mt-3 mt-sm-0">
                        <a onclick="mycopy();" class="btn btn-primary mt-2">Copy Referal Link</a>
                        
                     </div> <br> <br>
                     <?php
  if(isset($user['referral_id']))
        {
        
            $rid=$user['referral_id'];
            $sponser = "SELECT * FROM `user` WHERE `myrid`='$rid' ";
            $sponser_run=mysqli_query($conn,$sponser);
            if(mysqli_num_rows($sponser_run)>0){
                foreach($sponser_run as $sponser)
                {
                    ?>             
                            <div class="page-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- Basic Form Inputs card start -->
                                        <div class="card">
                                            <div class="card-block">
                                                <div class="m-b-20">
                                                    <h4 class="sub-title">Sponsor Information</h4>
                                                </div>
                                                <form action="#" method="POST">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Sponsor Name<span style="color: red;"></span></label>
                                                        <input name="" type="text" value="<?php echo $sponser['name']; ?>" id="" disabled="disabled" class="form-control" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Sponsor Id<span style="color: red;">*</span></label>
                                                        <input name="" type="text" value="<?php echo $sponser['myrid']; ?>" id="" disabled="disabled" class="form-control" />
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <?php
                }
            }

        }
    ?>
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="sub-title">Personal Information</h4>
                                                <div class="row m-b-20">
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                       
                                                        <label class="col-form-label">Name<span style="margin-left:15px;">(Kindly complete your KYC, to change the name. <a id="" href="" style="text-decoration:underline;">Click Here</a>)</span></label>
                                                        
                                                        <input name="" type="text" value="<?php echo $user['name']; ?>" readonly="readonly" id="" class="form-control" style="cursor: not-allowed;" />
                                                        

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Referral Id<span style="color: red;">*</span></label>
                                                        <input name="" type="text" value="<?php echo $user['myrid']; ?>" id="" disabled="disabled" class="form-control" autocomplete="nope" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Email</label>
                                                        <input name="" type="text" value="<?php echo $user['email']; ?>" readonly="readonly" id="" class="form-control" style="cursor: not-allowed;" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Mobile Number</label>
                                                        <input name="phone" type="text" disabled="disabled" value="<?php echo $user['mobile']; ?>"  id="" class="form-control" />
                                                    </div>
                                                </div>
                                               
                                               
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Enter City</label>
                                                        <input name="city" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['city']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input name="userId" type="hidden" id="" disabled="disabled" class="form-control" value="<?php echo $user['myrid']; ?>"/>
                                                    </div>
                                                    
                                                    
                                                </div>
                                          
                                        </div>
                                        <div class="form-group">
                                                 <h3 type="submit" name="submit" class="btn"><b>To Update Profile info mail us At piyush@gmail.com</b></h3>
                                              
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                     <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page-header start -->
                                        <div class="page-header">
                                            <div class="row align-items-end">
                                                <div class="col-lg-8">
                                                    <div class="page-header-title">
                                                        
                                                        <div class="d-inline">
                                                            <span>Change Your Password</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- Page-header end -->

                                        <!-- Page body start -->
                                        <div class="page-body">
                                            <div class="row">


                                                <div class="col-sm-12">
                                                    <!-- Basic Form Inputs card start -->
                                                    <div class="card">

                                                        <div class="card-block">
                                                                <form action="updatepass.php" method="POST"> 
                                                            <div class="m-b-20">
                                                                 
                                                                <h4 class="sub-title">Change Current Password</h4>

                                                            </div>
                                                         
                                                            <div class="form-group">
                                                                <div class="col-md-6 col-sm-12">
                                                                    <label class="col-form-label">Your Name</label>
                                                                    <input name="" type="text" value="<?php echo $user['name']; ?>" id="" disabled="disabled" class="aspNetDisabled form-control" />
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <label class="col-form-label">Your MT Id</label>
                                                                    <input name="" type="text" value="<?php echo $user['myrid']; ?>" id="" disabled="disabled" class="aspNetDisabled form-control" />
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <label class="col-form-label">Your Current Password</label>
                                                                    <input type="password" value="<?php echo $user['pass']; ?>" id="" disabled="disabled" class="form-control" />
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <label class="col-form-label">Enter New Password</label>
                                                                    <input name="new-pass" type="password" id="" class="form-control" requried/>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12">
                                                                    <label class="col-form-label">Repeat Password</label>
                                                                    <input name="repass" type="password" id="" class="form-control" requried/>
                                                                </div>
                                                               
                                                            </div>
                                                            <div class="row m-b-20">
                                                                <span id="" style="margin-left: auto; margin-right: auto; display: block; color: red;"></span>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-12">
                                                                    <div class="explore__moreBTN">
                                                                        <input type="submit" name="submit" value="Change Password" id="" class="btn" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- Page body end -->
                                    </div>
                                </div>
           
                            </div>
            </div>
        </div>
    </div>
    </div>
    <script>
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });

            $(".nav__close").click(function() {

                $("#sidebarCollapse").click();
            });
        </script>
    <?php
                }
            }else
            {
                ?>
                <p>not found</p>
                <?php

            }

        }
    ?>
   

    <?php include "../includes/footer.php";
?>
  