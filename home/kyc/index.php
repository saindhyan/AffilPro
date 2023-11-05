<?php
include "../includes/header.php";
?>
<link href="css/stepform.css" rel="stylesheet" />

<script src="css/jquery.min.js"></script>

<script src="src/js/kyc.js"></script>

<style>
                body {
                    position: relative;
                }   
                 .zoom-in-zoom-out {
                    -webkit-animation: zoom-in-zoom-out 2s ease-out infinite;
                    animation: zoom-in-zoom-out 2s ease-out infinite;
                }

                @keyframes zoom-in-zoom-out {
                    0% {
                        transform: scale(1, 1);
                    }

                    50% {
                        transform: scale(1.2, 1.2);
                    }

                    100% {
                        transform: scale(1, 1);
                    }
                }

    .container {
      max-width: 700px;
      width: 100%;
      background-color: #fff;
      padding: 25px 30px;
      border-radius: 5px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
      margin-top: 78px;
      margin-left: 14px; 
    margin-bottom: 120px;
    margin-top: 78px;
    }

    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }

    .container .title::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      border-radius: 5px;
      background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .user-details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: calc(100% / 2 - 20px);
    }

    form .input-box span.details {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
      font-size: 13px;
      color: black;
    }
    /*font-size: 13px;
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
    color: black;*/

    .user-details .input-box input {
      height: 45px;
      width: 100%;
      outline: none;
      font-size: 16px;
      border-radius: 5px;
      padding-left: 15px;
      border: 1px solid #ccc;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
      border-color: #9b59b6;
    }

    form .gender-details .gender-title {
      font-size: 20px;
      font-weight: 500;
    }

    form .category {
      display: flex;
      width: 80%;
      margin: 14px 0;
      justify-content: space-between;
    }

    form .category label {
      display: flex;
      align-items: center;
      cursor: pointer;
    }

    form .category label .dot {
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 10px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
      background: #9b59b6;
      border-color: #d9d9d9;
    }

    form input[type="radio"] {
      display: none;
    }

    form .button {
      height: 45px;
      margin: 35px 0
    }

    form .button input {
      height: 100%;
      width: 100%;
      border-radius: 5px;
      border: none;
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      background: #007aff;
    }

    form .button input:hover {
      /* transform: scale(0.99); */
      background: #007aff;
    }

    @media(max-width: 584px) {
      .container {
        max-width: 100%;
      }

      form .user-details .input-box {
        margin-bottom: 15px;
        width: 100%;
      }

      form .category {
        width: 100%;
      }

      .content form .user-details {
        max-height: 300px;
        overflow-y: scroll;
      }

      .user-details::-webkit-scrollbar {
        width: 5px;
      }
    }

    @media(max-width: 459px) {
      .container .content .category {
        flex-direction: column;
      }
    }
    
    @media(min-width: 458px) {
    .container {
    max-width: 1185px;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgb(0 0 0 / 15%);
    margin-top: 40px;
    margin-left: 14px;
    margin-bottom: 120px;
    margin-right: 18px;
    margin-left: 52px!important;
      }
    }
    
            </style>

<?php
        if(isset($_SESSION['uid']))
        {

            $u_id=$_SESSION['uid'];
            $user = "SELECT * FROM `kycdetails` WHERE `uid`='$u_id' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)>0){
                foreach($user_run as $user)
                {
                    ?>
                   
                  
<link href="sidebar_affiliate.css" rel="stylesheet" />
                  <div class="page-header">
                            <div class="row align-items-end">
                                <div id="ContentPlaceHolder1_NestedContentPlaceHolder_kycmsg"
                                    class="col-lg-8">
                                    <div class="page-header-title">
                                        <button type="button" id="sidebarCollapse"
                                            class="btn navbar-btn" style="position:relative; margin-top:41px!important; margin-left:30px;">
                                            <i class="glyphicon glyphicon-align-left"></i>
                                            <span></span>
                                        </button>
<div class="container">
<div class="title"><span style="color: #007aff">
<h6 class="mb-0">KYC Status</h6>
                    <h6 class="mb-0"><?php echo $user['status']; ?></h6>

                                                
                                               </span></div>
                                               
<div class="content">
<form action="updatekyc.php" method="Post" enctype="multipart/form-data">
<div class="user-details">
<div class="card">
                                                        <div class="card-block">
                                                            <h4 class="sub-title">Upload Passbook Photo</h4>
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
                                                    </div>
<div class="input-box">
<span class="details">Account Holder Name</span>
<input type="text"  name="name" value="<?php echo $user['account_name']; ?>" type="text"   required>
</div>
<div class="input-box">
<span class="details">Bank Account Number</span>
<input type="text"  name="account"    value ="<?php echo $user['account_number']; ?>"  required>
</div>
<div class="input-box">
<span class="details">Bank Name</span>
<input type="text" name="bank"    value ="<?php echo $user['bank_name']; ?>" required>
</div>

<div class="input-box">
<span class="details">IFSC  Code</span>
<input type="text"  name="ifsc"  value ="<?php echo $user['ifsc_code']; ?>" required>
</div>
<div class="input-box">
<span class="details">Branch</span>
<input type="text"  name="branch" value ="<?php echo $user['branch']; ?>"  required>
</div>
<!--<div class="input-box">
<span class="details">UPI</span>
<input type="text" name="upiId" value =""   > 
</div>
                -->
</div>
<div class="button">
    <?php
    if($user['status']=="Not Submited" || $user['status']=="Rejected"){
        ?>
                            <input type="submit" name="submit" value="Submit" class="btn btn-default" />
        <?php


    }elseif($user['status']=="Submited(Not Aproved)" || $user['status']=="Aproved"){
       
    }
    ?>

</div>
</form>
</div>
</div>
</main>
                                    </div>
                                </div>

                            </div>
                        </div>
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

<script>
$("#sidebarCollapse").on("click", function() {
$("#sidebar").toggleClass("active");
$(this).toggleClass("active");
});

$(".nav__close").click(function() {

$("#sidebarCollapse").click();
});

<?php
include "../includes/footer.php";
?>