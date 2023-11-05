<?php
// Include the database configuration file
include '../includes/db.php';
session_start();

$targetDir = "../image/kyc/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$accountname=$_POST["name"];
$accountnumber=$_POST["account"];
$bank=$_POST["bank"];
$ifsc=$_POST["ifsc"];
$branch=$_POST["branch"];
$uid=$_SESSION['uid'];

if(isset($_POST["submit"]) && isset($_FILES["file"])&& !empty($_FILES["file"])&& isset($_POST["name"])&& isset($_POST["account"])&& isset($_POST["bank"])&& isset($_POST["ifsc"])&& isset($_POST["branch"])){
$error= $_FILES['file']['error'];
if($error===0){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("update kycdetails SET passbook='".$fileName."', account_name='$accountname' ,account_number='$accountnumber',bank_name='$bank',ifsc_code='$ifsc',branch='$branch' ,status='Submited(Not Aproved) 'WHERE uid='$uid'");
            if($insert){
                echo' <script>alert("The Kyc has been submitted for approval.!")
                history.back()
                </script>';
        exit();
            }else{
                echo' <script>alert("passbook photo upload failed, please try again.!")
                history.back()
                </script>';
                exit();
            } 
        }else{
            echo' <script>alert("Sorry, there was an error uploading your passbook photo.")
            history.back()
            </script>';
            exit();
        }
    }else{
        echo' <script>alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.")
        history.back()
        </script>';
        exit();
    }
}else{
    echo' <script>alert("Please select a passbook photo to upload.")
    history.back()
    </script>';
    exit();

}


}else{
    echo' <script>alert("Please select a passbook photo to upload.")
    location.href = "index.php"
    </script>';
    exit();


}
?>
<script>alert(<?php $statusMsg ?>);
location.href = "index.php";
</script>
<?php



?>