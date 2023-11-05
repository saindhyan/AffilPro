<?php
include "..\includes\db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>user details</title>


</head>
<body>
    <?php
        if(isset($_GET['id']))
        {
            include "..\includes\layout.php";

            $u_id=$_GET['id'];
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
                    <!-- Main-body start -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- Page-header start -->
                             <br> <br>
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
                                                       
                                                        <label class="col-form-label">Name<span style="margin-left:15px;"></span></label>
                                                        
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
                                                        <label class="col-form-label"> City</label>
                                                        <input name="city" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['city']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input name="userId" type="hidden" id="" disabled="disabled" class="form-control" value="<?php echo $user['myrid']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">User Id</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['uid']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Is Verified</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['isverified']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Courses</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['coursesenroled']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Subscription</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['subscription']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Time of registration</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['time']; ?>"/>
                                                    </div>
                                                    <div class="form-group">
                                                 <h3 type="submit" name="submit" class="btn"><b>Earnings</b></h3>
                                              
                                        </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">Unpaid Ammount</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['unpaidamount']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label"> 7 days</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['7dayserning']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">1 month</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['onemonthearning']; ?>"/>
                                                    </div><div class="col-sm-6">
                                                        <label class="col-form-label">This Year</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['oneyearearning']; ?>"/>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-form-label">All time</label>
                                                        <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $user['alltimeearning']; ?>"/>
                                                    </div>
                                                  
                                                    
                                                </div>
                                          
                                        </div>
                                        
                                        </div>                             
<?php
                                    $bank = "SELECT * FROM `kycdetails` WHERE `uid`='$u_id' ";
            $bank_run=mysqli_query($conn,$bank);
            if(mysqli_num_rows($bank_run)>0){
                foreach($bank_run as $bank)
                {
                    ?>  <div class="card">
                    <div class="card-block">
                        <h4 class="sub-title">Personal Information</h4>
                        <div class="row m-b-20">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                               
                                <label class="col-form-label">Name<span style="margin-left:15px;"></span></label>
                                
                                <input name="" type="text" value="<?php echo $bank['account_name']; ?>" readonly="readonly" id="" class="form-control" style="cursor: not-allowed;" />
                                

                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Bank Name<span style="color: red;">*</span></label>
                                <input name="" type="text" value="<?php echo $bank['bank_name']; ?>" id="" disabled="disabled" class="form-control" autocomplete="nope" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-form-label">Account Number</label>
                                <input name="" type="text" value="<?php echo $bank['account_number']; ?>" readonly="readonly" id="" class="form-control" style="cursor: not-allowed;" />
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Ifsc</label>
                                <input name="phone" type="text" disabled="disabled" value="<?php echo $bank['ifsc_code']; ?>"  id="" class="form-control" />
                            </div>
                        </div>
                       
                       
                        
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="col-form-label"> Branch</label>
                                <input name="city" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $bank['branch']; ?>"/>
                            </div>
                            <div class="col-sm-6">
                                <input name="userId" type="hidden" id="" disabled="disabled" class="form-control" value="<?php echo $bank['branch']; ?>"/>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-form-label">Status</label>
                                <input name="uid" type="text" id=""  disabled="disabled "class="form-control" value="<?php echo $bank['status']; ?>"/>
                                
</div>
                          
                            
                        </div>
                        <?php
                        if($bank['status']=='Aproved'){
                            ?>
                            <div class="col-sm-6">
                               <a href="../bankrequests/reject.php?id=<?php echo $bank['uid']?>"> <Button name="uid" style="background-color:#2196f3;" type="submit" id=" "class="form-control">Reject</Button>
                                </a>
</div>
                          
                            
                        </div>
                        <?php
                        }else{
                            ?>
                            <div class="col-sm-6">
                            <a href="../bankrequests/approve.php?id=<?php echo $bank['uid']?>">      <Button name="uid" style="background-color:#2196f3;" type="submit" id=" "class="form-control">Aprove</Button>
                        </a>
</div>
                          
                            
                        </div>
                        <?php
                        }
                       ?>
                  
                  
                </div>
                
                </div>
                                     
                                        <?php 
                }
            }
            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                
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
</body>
</html>