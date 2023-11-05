<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<?php 
 
session_start();
include "..\includes\db.php";
if (isset($_SESSION['email'])) {
    if(isset($_SESSION['uid']))
    {

        $err=true;
        $u_id=$_SESSION['uid'];
        $newcode=rand(1000,9999);

        $insertcode = $conn->query("UPDATE  user set code='$newcode' WHERE uid='$u_id' ");

        $user = "SELECT * FROM `user` WHERE `uid`='$u_id' ";
        $user_run=mysqli_query($conn,$user);
        if(mysqli_num_rows($user_run)>0){
            foreach($user_run as $user)
            {if($user['isverified']==1){
                echo' <script>alert("You are already verified")
                location.href = "/affilpro/home"
                </script>';
                exit();
            }else{
                date_default_timezone_set("Asia/Calcutta");  
                $now = new DateTime();
                $currenttime=$now->format('Y-m-d H:i:s');
                if($currenttime>$user['codevalidtime']){
                $otp=$user['code'];
                $mobile=$user['mobile'];

                    ?>
                    <?php

$fields = array(
    "variables_values" => "$otp for AFFILPRO verification",
    "route" => "otp",
    "message "=> "{#FF#} is your OTP to verify your AFFILPRO account",
    "variables"=>"{#FF#}",
    "numbers" => "$mobile",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: K6CAItWvJuGxOUlh9Qb8MF0BpLjiZyXSsRDk3nrTmcP25gazENEo8R1qHrtei64GKX2NjOLymBTc5WF3",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
                }else{
                    echo' <script>alert("Code Already Sent");
                    </script>';


                }
?>

                       <link rel="stylesheet" href="/affilpro/assets/css/mainStyle.css">
                       <link rel="stylesheet" href="/affilpro/assets/css/style.min.css">
             
                       <script src="https://www.google.com/recaptcha/api.js"></script> 
                   <div class='main_login_section'><br><br><br><br><br>
      <div class='container-xl login_row-main' style="width:500px;">
                <div class='secon_login_mt'>
                    <h2>verify your account</h2>
                 <form action="verify.php" method="post">

                    <div class="mb-3 mt_input">
                        <label  class="form-label">send otp to <?php echo $user['mobile']?></label>
                        <br>
<br>
                        <label  onclick="location.reload();" class="edu-btn">Resend otp</label>

                    </div>
                    <br>
                    <?php
                    if ($err) {
                        ?>
                        <lable id="otptext" style="margin-top:10px;">Otp Not Sent</lable>
                        <?php
                    } else {
                        $insert = $conn->query("UPDATE  user set codevalidtime=now() + INTERVAL 1 MINUTE  WHERE uid='$u_id' ");

    ?>
    <lable id="otptext" style="margin-top:10px;">Otp Sent</lable>
    <?php
}?>

                    <div class="mb-3 mt_input">
                        <input type="otp" name="otp" class="form-control1" id="exampleFormControlInput1" placeholder="Enter Otp here"style="margin-top:20px;">
                    </div>
                    <div class="mb-3 mt_input">
<br>
                    <div class="g-recaptcha" data-sitekey="6Ld5DBQlAAAAAHC74zOitJK5gNnpcuX3jBDGztR6"></div>
                    </div>

                <button class="_btn_04" name="verify"style="margin-top:20px;"> Verify Otp</button>
            
                </form>
              </div>
          </div>
    
  </div>
  </body>
</html>
                    <?php
                    }
           }   }else
            {
                echo' <script>alert("Something went wrong")
                location.href = "/affilpro/login"
                </script>';
                exit();


            }
        }else{
            echo' <script>alert("Something went wrong")
            location.href = "/affilpro/login"
            </script>';
            exit();
        }
        }else{

            echo' <script>alert("Something went wrong")
            location.href = "/affilpro/login"
            </script>';
            exit();

}
?>

