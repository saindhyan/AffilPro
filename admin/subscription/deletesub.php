<?php
include "../includes/db.php";
if(isset($_GET['id']))
{
    $sid=$_GET['id'];
    $sub = "SELECT * FROM `subpacks` WHERE `sid`='$sid' ";
    $sub_run=mysqli_query($conn,$sub);
    if(mysqli_num_rows($sub_run)>0){
        foreach($sub_run as $sub)
        {
            ?>
            <p > <?php echo $sub['title']; ?></p>
            <?php
            mysqli_query($conn,"DELETE FROM subpacks WHERE sid=$sid");

            header("Location:index.php");

        }
    }else
    {
        ?>
        <p>not found</p>
        <?php

    }

}
?>