<?php
// Include the database configuration file
include '../includes/db.php';

$targetDir = "../../assets/image/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$mobilefileName = basename($_FILES["mobilefile"]["name"]);
$mobiletargetFilePath = $targetDir . $mobilefileName;

$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$mobilefileType = pathinfo($mobiletargetFilePath,PATHINFO_EXTENSION);

$title=$_POST["title"];
$link=$_POST["link"];

if(isset($_POST["submit"]) && isset($_FILES["file"]) && isset($_FILES["mobilefile"])&& isset($_POST["title"])&& isset($_POST["link"])){
$error= $_FILES['file']['error'];
$mobileerror= $_FILES['file']['error'];

if($error===0&&$mobileerror===0){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)&&in_array($mobilefileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)&&move_uploaded_file($_FILES["mobilefile"]["tmp_name"], $mobiletargetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into banner (file_name,mobileFile, title ,link) VALUES ('".$fileName."','".$mobilefileName."',' $title','$link')");
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