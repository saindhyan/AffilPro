<?php
session_start();
$uid=$_SESSION['uid'];
include "../includes/db.php";
if (isset($_POST['submit'])&& isset($_POST['new-pass'])&& isset($_POST['repass'])){
    $pass=$_POST['new-pass'];
    if($_POST['new-pass']==$_POST['repass']){
        if (strlen($_POST['new-pass']) > 20 || strlen($_POST['new-pass']) < 5) {
            echo' <script>alert("Password must be between 5 and 20 characters long!")
            history.back()
            </script>';
            exit();
        }elseif (preg_match('/^[a-zA-Z0-9]+$/', $_POST['new-pass']) == 0) {
            echo' <script>alert("password should not contain /^[a-zA-Z0-9]+$/!")
            history.back()
            </script>';
            exit();
        }else{
        $insert = $conn->query("update user SET pass='$pass' WHERE `uid`='$uid' ");
        if($insert){
            echo' <script>alert("Password updated successfully")
            history.back()
            </script>';
                exit();   
    }else{
        echo' <script>alert("Something Went wrong")
        history.back()
        </script>';
        exit();   
    }
}
}else{
    echo' <script>alert("Enter Confirm Password Carefully")
    history.back()
    </script>';
    exit(); 
}
}else{
    echo' <script>alert("Enter Password Carefully")
    history.back()
    </script>';
    exit(); 
}
?>