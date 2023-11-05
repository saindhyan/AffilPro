<?php
// Include the database configuration file
include '../includes/db.php';

$name=$_POST["Name"];
$duration=$_POST["duration"];
$link=$_POST["Link"];
$coursetable="course".$_GET['id'];




if(isset($_POST["submit"])&& isset($_POST["Name"])&&isset($_POST["duration"])&&isset($_POST["Link"])){

            // Insert image file name into database
            $insert = $conn->query("INSERT into $coursetable(sectionname, duration ,link) VALUES (' $name','$duration','$link')");

            if($insert){
                header("Location:index.php");

                $statusMsg = "Part uploaded succusfully has been uploaded successfully.";
            }else{
                header("Location:index.php");

                $statusMsg = "part upload failed, please try again.";
            } 
        }
echo $statusMsg;

?>