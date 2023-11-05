<?php
include "../includes/db.php";
if(isset($_GET['course'])&& isset($_GET['part']))
{
    $part=$_GET['part'];
    $coursen=$_GET['course'];
    $coursetable="course".$coursen;
    $course = "SELECT * FROM $coursetable WHERE `id`='$part' ";
    $course_run=mysqli_query($conn,$course);
    if(mysqli_num_rows($course_run)>0){
        foreach($course_run as $course)
        {
            mysqli_query($conn,"DELETE FROM $coursetable WHERE id=$part");

            header("Location:editparts.php?id=$coursen");

        }
    }else
    {
        ?>
        <p>not found</p>
        <?php

    }

}
?>