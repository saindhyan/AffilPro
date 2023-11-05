<?php
include "../includes/db.php";
$email=$_SESSION['email'];
$uid=$_SESSION['uid'];
$sql = "SELECT * FROM user WHERE email='$email' AND uid='$uid'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

            if($row['ispurchased']==1){
                
            }elseif($row['ispurchased']==0){
             header("Location:purchase.php");
            }

    }else{

        echo' <script>alert("something went wrong")
        location.href = "/affilpro/login"
        </script>';
        exit();

    }

?>