<?php
include "..\includes\db.php";
session_start(); 

if(isset($_POST["otp"]) && isset($_POST["newpass"])){
    if (strlen($_POST['newpass']) > 20 || strlen($_POST['newpass']) < 5) {
        echo' <script>alert("Password must be between 5 and 20 characters long!")
        location.href = "/affilpro/forgot/"
        </script>';
        exit();
    }elseif (preg_match('/^[a-zA-Z0-9]+$/', $_POST['newpass']) == 0) {
        echo' <script>alert("password should not contain /^[a-zA-Z0-9]+$/!")
        location.href = "/affilpro/forgot/"
        </script>';
        exit();
    }else{
$entredotp=$_POST['otp'];
$newpass=$_POST['newpass'];

?>
<?php

            $u_id=$_SESSION['uid'];
            $account = "SELECT * FROM `user` WHERE `uid`='$u_id' ";
            $account_run=mysqli_query($conn,$account);
            if(mysqli_num_rows($account_run)==1)
            {
                foreach($account_run as $account)
                {
                $code=$account['code'];
               if($entredotp==$code){
                $myrid='AF'.$u_id;
                $code=rand(1000,9999);
                $insert = $conn->query("UPDATE  user set isverified='1',code='$code', pass='$newpass',myrid='$myrid' WHERE uid='$u_id' ");
         if($insert){
            var_dump($_SESSION['uid']);
            session_unset();
            session_destroy();
            echo' <script>alert("password updated successfully")
            location.href = "/affilpro/login"
                </script>';
                exit();

         }
        }else{
            echo' <script>alert("Enter Correct Otp ")
            location.href = "/affilpro/forgot/"
            </script>';
            exit();
         }
               }
            }else
            {
                var_dump($_SESSION['uid']);
                session_unset();

                session_destroy();
                echo' <script>alert("Account not found")
                location.href = "/affilpro/login"
                </script>';
                exit();
            }
      }  }else{
        var_dump($_SESSION['uid']);
        session_unset();

        session_destroy();
            echo' <script>alert("please enter otp and password properly")
            location.href = "/affilpro/forgot/"
            </script>';
                exit();
        }
       
exit();
    ?>
