<?php
// Include the database configuration file
include '../includes/db.php';

$targetDir = "../../assets/image/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$name=$_POST["Name"];
$oprice=$_POST["original-price"];
$cprice=$_POST["current-price"];
$sdisc=$_POST["sort-disc"];
$ldisc=$_POST["long-disc"];




if(isset($_POST["submit"]) && isset($_FILES["file"])&& isset($_POST["Name"])&& isset($_POST["original-price"])&& isset($_POST["current-price"])&& isset($_POST["sort-disc"])&& isset($_POST["long-disc"])){
    $error= $_FILES['file']['error'];
$error= $_FILES['file']['error'];
if($error===0){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into course_available(cicon, cname ,coprice,cprice,disc,cdisc) VALUES ('".$fileName."',' $name','$oprice','$cprice','$sdisc','$ldisc')");

            if($insert){
                header("Location:index.php");

                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                header("Location:index.php");

                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            header("Location:index.php");

            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        header("Location:index.php");

        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    header("Location:index.php");
}


}else{
    $statusMsg = 'Please select a file to upload.';

}
echo $statusMsg;

?>