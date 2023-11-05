<?php
include "../includes/db.php";
if(isset($_GET['id']))
{
    $bid=$_GET['id'];
    $banner = "SELECT * FROM `banner` WHERE `bid`='$bid' ";
    $banner_run=mysqli_query($conn,$banner);
    if(mysqli_num_rows($banner_run)>0){
        foreach($banner_run as $banner)
        {
            ?>
            <p > <?php echo $banner['title']; ?></p>
            <?php
            mysqli_query($conn,"DELETE FROM banner WHERE bid=$bid");

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