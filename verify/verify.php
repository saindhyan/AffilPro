<?php
$secretKey  = '6Ld5DBQlAAAAADuQQHe7ZjJjyxoykGpgrH-pG-yl'; 

include "..\includes\db.php";
session_start();
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
        // Decode JSON data of API response 
        $responseData = json_decode($verifyResponse); 
         
        // If the reCAPTCHA API response is valid 
if($responseData->success){ 
    if(isset($_POST["otp"]) && !empty($_POST['otp'])){
    $entredotp=$_POST['otp'];
    ?>
    <?php

                $u_id=$_SESSION['uid'];
                $account = "SELECT * FROM `user` WHERE `uid`='$u_id' ";
                $account_run=mysqli_query($conn,$account);
                    if(mysqli_num_rows($account_run)==1) {
                        foreach($account_run as $account)
                        {
                           $code=$account['code'];
                            if($entredotp==$code){
                                $myrid='AF'.$u_id;
                                $newcode=rand(1000,9999);
                                $insert = $conn->query("UPDATE  user set isverified='1',code='$newcode', myrid='$myrid' WHERE uid='$u_id' ");
                                $insertbank = $conn->query("INSERT into kycdetails (uid) VALUES ('$u_id')");
                                        if($insert && $insertbank){
                                            echo' <script>alert("User Verified Sucussfully")
                                                location.href = "/affilpro/home"
                                                </script>';
                                                exit();

                                        }
                            }else{
                                echo' <script>alert("Enter Correct Otp")
                                history.back()
                                </script>';
                                exit();
                            }
                        }
                    }else{
                        echo' <script>alert("User Not Fond")
                        history.back()
                        </script>';
                        exit();
                    }
        }else{
         echo' <script>alert("please enter otp")
         history.back()
        </script>';
            exit();
        }
  }else{
   echo' <script>alert("please enter otp and ReCaptcha Carefully")
    history.back()
     </script>';
    exit();
    }
}else{
    echo' <script>alert("Enter ReCaptcha")
    history.back()
    </script>';
            exit(); 
}

    ?>
