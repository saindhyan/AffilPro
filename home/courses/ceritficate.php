<?php
include "../includes/db.php";
session_start();
$uid=$_SESSION['uid'];
$cid=$_SESSION['cid'];
$duration=$_SESSION['duration'];
$name=$_SESSION['name'];
$myrid=$_SESSION['myrid'];
$date=date('y'.'m'.'d'.'H'.'i'.'s');
$certiid="c_".$date;


$sql = "SELECT * FROM certificate WHERE `uid`='$uid' AND `courseid`=$cid ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {
  $row = mysqli_fetch_assoc($result);
	$font="MangabeyRegular-rgqVO.otf";
	$image=imagecreatefromjpeg("certificate.jpg");
	$color=imagecolorallocate($image,19,21,22);
      $color2=imagecolorallocate($image,64,150,230);

    imagettftext($image,70,0,330,775,$color2,"AGENCYR.TTF",ucwords($row['name']));
		imagettftext($image,30,0,245,515,$color,$font,$row['genrated_on']);
    $font2="MangabeyRegular-rgqVO.otf";

    imagettftext($image,43,0,572,895,$color,"AGENCYR.TTF",round((($row['course_duration'])/60),2)." Hours Course");
    imagettftext($image,40,0,140,960,$color,"AGENCYR.TTF",ucwords($row['course_name']));
    imagettftext($image,30,0,555,1013,$color,"AGENCYR.TTF","AFFILPRO");
    imagettftext($image,20,0,555,1140,$color,"AGENCYR.TTF",$row['certi_id']);



		$file=time().'_'.$row['certi_id'];
		imagejpeg($image,"certificate/".$file.".jpg");
		imagedestroy($image);


$filepath="certificate/".$file.".jpg";
if (file_exists($filepath)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($filepath));
      flush(); // Flush system output buffer
      readfile($filepath);
      unlink($filepath);
      echo"<script> history.back()</script>";

      die();
    } else {
      http_response_code(404);
      echo"<script> history.back()</script>";

      die();
    }
  


}else{
    $sql = "SELECT cname FROM course_available WHERE cid='$cid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  foreach($result as $sql)
  {
    $coursename=$sql['cname'];
  }
}


    $insert = $conn->query("INSERT into certificate (certi_id, courseid ,uid,name,myrid,course_name,course_duration) VALUES ('$certiid',' $cid','$uid','$name','$myrid','$coursename','$duration')");
        
    if($insert){
      echo'<script>location.reload()</script>';
    }
}
?>