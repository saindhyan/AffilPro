
<?php
include "../includes/db.php";
        if(isset($_GET['id']))
        {

            $u_id=$_GET['id'];
            $user = "update kycdetails SET status='Rejected' WHERE `uid`='$u_id' ";
            $user_run=mysqli_query($conn,$user);
           
            if($user){
                echo' <script>alert("Rejected")
                location.href = "index.php"
                </script>';
                exit();
            }
        }
    ?>