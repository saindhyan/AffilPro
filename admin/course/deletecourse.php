<?php
include "../includes/db.php";
if(isset($_GET['id']))
{
    $cid=$_GET['id'];
    $course = "SELECT * FROM `course_available` WHERE `cid`='$cid' ";
    $course_run=mysqli_query($conn,$course);
    if(mysqli_num_rows($course_run)>0){
        foreach($course_run as $course)
        {
            ?>
            <p > <?php echo $course['cname']; ?></p>
            <?php
            mysqli_query($conn,"DELETE FROM course_available WHERE cid=$cid");

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