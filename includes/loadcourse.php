<?php
$host = "localhost"; //IP of your database
$userName = "root"; //Username for database login
$userPass = ""; //Password associated with the username
$database = "emphlsadmin"; //Your database name

$connectQuery = mysqli_connect($host,$userName,$userPass,$database);

if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
    $selectQuery = "SELECT * FROM `course_available` ORDER BY `cid` DESC";
    $course_result = mysqli_query($connectQuery,$selectQuery);
    if(mysqli_num_rows($course_result) > 0){
        $msg = "";

    }else{
        $msg = "No Record found";
    }
}
?>