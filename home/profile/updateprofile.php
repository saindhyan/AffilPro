<?php 
include '../includes/db.php';

$targetDir = "../image/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && isset($_FILES["file"])){
    $error= $_FILES['file']['error'];
    if($error===0){
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("update user SET pimage='".$fileName."' ");
                if($insert){
                    echo' <script>alert("The file  has been uploaded successfully")
                    history.back()
                    </script>';
                    exit();
    
    
                }else{
                    echo' <script>alert("File upload failed, please try again.")
                    history.back()
                    </script>';
                    exit();
                   
                } 
            }else{
                echo' <script>alert("Sorry, there was an error uploading your file.")
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
        echo' <script>alert("Sorry, there was an error uploading your file.")
        history.back()
        </script>';
        exit();       }
    
    
    }else{
        echo' <script>alert("Please select a file to upload.")
        history.back()
        </script>';
            exit(); 
    
    }
    
    ?>