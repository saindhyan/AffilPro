<?php
// Include the database configuration file
include '../includes/db.php';

$targetDir = "../../assets/image/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$name=$_POST["Name"];
$price=$_POST["price"];
$benefits=$_POST["Benefits"];
$cin=$_POST["Course"];
$disc=$_POST["disc"];
$sid=$_POST["sid"];
$cin=$_POST["Course"];





if(isset($_POST["submit"]) && isset($_FILES["file"])&& isset($_POST["Name"])&& isset($_POST["price"])&& isset($_POST["Benefits"])&& isset($_POST["disc"])&& isset($_POST["Course"])&& isset($_POST["sid"])){
$error= $_FILES['file']['error'];
if($error===0){
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("update subpacks SET sicon='".$fileName."', sname='$name' ,sprice='$price',sbanefits='$benefits',cin='$cin',sdisc='$disc' WHERE sid='$sid'");
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