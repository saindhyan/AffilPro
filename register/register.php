
<?php 

session_start(); 


include "..\includes/db.php";
$mobile=$_POST['phone'];
$email=$_POST['email'];
$uname=$_POST['name'];
$city=$_POST['city'];
$pass=$_POST['password'];
$rid=$_POST['sponsorId'];
$code=rand(1000,9999);


if (empty($_POST['name'] || $_POST['email'] || $_POST['city'] || $_POST['phone'] || $_POST['password'])) {
	// One or more values are empty.
    echo' <script>alert("Please complete the registration form!")
    history.back()
    </script>';
}else{
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo' <script>alert("Email is not valid!")
        history.back()
        </script>';
        exit();
    }elseif (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        echo' <script>alert("Password must be between 5 and 20 characters long!")
        history.back()
        </script>';
        exit();
    }elseif (preg_match('/^[a-zA-Z0-9]+$/', $_POST['password']) == 0) {
        echo' <script>alert("password should not contain /^[a-zA-Z0-9]+$/!")
        history.back()
        </script>';
        exit();
    }elseif (strlen($_POST['phone']) < 10 || strlen($_POST['phone']) <10) {
        echo' <script>alert("enter valid number without country code")
        history.back()
        </script>';
        exit();
    }else{
        $sponser = "SELECT * FROM `user` WHERE `myrid`='$rid' ";
    $sponser_run=mysqli_query($conn,$sponser);
    $user = "SELECT * FROM `user` WHERE `mobile`='$mobile' ";
    $user_run=mysqli_query($conn,$user);
    $usere = "SELECT * FROM `user` WHERE `email`='$email' ";
    $usere_run=mysqli_query($conn,$usere);
    if(mysqli_num_rows($user_run)>0){
        echo' <script>alert("mobile alredy exists")
        history.back()
                </script>';
                exit();

    }elseif(mysqli_num_rows($usere_run)>0){
        echo' <script>alert("email alredy exists")
        history.back()
                </script>';
                exit();
    }elseif(!isset($_POST['sponsorId'])&& mysqli_num_rows($sponser_run)<1){
        echo' <script>alert("Enter valid Referal Code")
        history.back()
                </script>';
                exit();
    }else{
         // Insert image file name into database
         $insert = $conn->query("INSERT into user (name, mobile ,email,referral_id,pass,city,code) VALUES ('$uname',' $mobile','$email','$rid','$pass','$city','$code')");
        
         if($insert){
            echo' <script>alert("User registered successfully (Login and verify your account now)")
                location.href = "/affilpro/login"
                </script>';
                exit();

         }
    }

    }
}
?>
