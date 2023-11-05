<?php
// Include the database configuration file
include '../includes/db.php';

$name=$_POST["Name"];
$duration=$_POST["duration"];
$link=$_POST["Link"];
$coursetable="course".$_GET['course'];
$part=$_GET['part'];

$course=$_GET['course'];


if(isset($_POST["submit"])&& isset($_POST["Name"])&&isset($_POST["duration"])&&isset($_POST["Link"])){

            // Insert image file name into database
            $insert = $conn->query("UPDATE $coursetable set sectionname='$name',duration='$duration',link='$link' WHERE id='$part' ");

            if($insert){
                header("Location:editparts.php?id=$course");

                $statusMsg = "Part uploaded succusfully has been uploaded successfully.";
            }else{
                header("Location:editparts.php?id=$course");

                $statusMsg = "part upload failed, please try again.";
            } 
        }
echo $statusMsg;

?>