
<?php 

session_start(); 


include "../includes/db.php";
$mobile=$_POST['phone'];
$email=$_POST['email'];
$uname=$_POST['name'];
$subject=$_POST['subject'];
$msg=$_POST['msg'];

if(isset($_POST['submit'])){

if (empty($_POST['name'] || $_POST['email'] || $_POST['subject'] || $_POST['phone'] )) {
	// One or more values are empty.
    echo' <script>alert("Please complete the form !")
    history.back()
    </script>';
}else{
   
         // Insert image file name into database
         $insert = $conn->query("INSERT into feedback (name, phone ,email,subject,msg) VALUES ('$uname',' $mobile','$email','$subject','$msg')");
        
         if($insert){
            echo' <script>alert("Submited")
            history.back()
            </script>';
                exit();

         }

    }
}else{
    echo "Someting went wrong";
}
?>
