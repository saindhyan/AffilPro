<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require '../../vendor/autoload.php';
require '../../vendor/PHPMailer/phpmailer/src/Exception.php';
require '../../vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require '../../vendor/PHPMailer/phpmailer/src/SMTP.php';
?><!DOCTYPE html>
<html>
<head>
	<title>Cashfree - PG Response Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<h1 align="center">Verifying Transection...</h1>	

	<?php
include "../includes/db.php";
$orderId = $_GET['orderid'];
$curl = curl_init();
$appid="TEST3543761364010b795cd3ce9193673453";
$secretkey="TEST59d7217106d927616a6ec66b8eba3dd391af4ba8";
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sandbox.cashfree.com/pg/orders/$orderId",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "x-api-version: 2022-09-01",
    "x-client-id: $appid",
    "x-client-secret:$secretkey"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$decode=json_decode($response);
  $type=$decode->order_tags->type;
  $sponser=$decode->order_tags->sponser;
  $orderid=$decode->order_id;
  $price=$decode->order_amount;
  $myrid=$decode->order_tags->myrid;
  $uid=$decode->customer_details->customer_id;
$gmail=$decode->customer_details->customer_email;
$name=$decode->customer_details->customer_name;
if(!$err) {
    $result = json_decode($response, true);
    if($result["order_status"] == 'PAID'){
		$decode=json_decode($response);
  $type=$decode->order_tags->type;
  $sponser=$decode->order_tags->sponser;
  $orderid=$decode->order_id;
  $price=$decode->order_amount;
  $myrid=$decode->order_tags->myrid;
  $uid=$decode->customer_details->customer_id;



		if($type=="course"){
			$coursename=$decode->order_tags->coursename;
			$courseid=$decode->order_tags->courseid;
			$mail = new PHPMailer(true);

			try{
			$mail->IsSMTP();
			$mail->Host= "smtp.gmail.com";
			$mail->Port       = 587;
			$mail->SMTPSecure = "tls";
			$mail->SMTPAuth   = true;       
			$mail->Username   = "certificate.affilpro@gmail.com";
			$mail->Password   = "hwqluzqhyvymacqg";
			$mail->SetFrom("certificate.affilpro@gmail.com", "piyush saini");
			$mail->AddAddress("$gmail", "$name");
			$mail->IsHTML(true); 
			$mail->Subject = "Purchase successfull";
			$content = "<b>hey $name </b> <br> Yor purchase has been sucussfull for <br> Order Id  	   $orderid<br>
																						  Price			  $price<br>
																						  Affiliate id 	  $myrid<br>
																						  Purchase 		  $coursename Course";
			$mail->Body=$content; 
			if(!$mail->Send()) {
				echo "Error while sending Email.";
				var_dump($mail);
				} else {
	
					$msg="Check Email for further information";
				}

				} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
			?>
			<div class="container"> 
		<div class="panel panel-success">
		  <div class="panel-heading">Verification Successful</div>
		  
	
		</div>
		</div>
		<?php
			$sponseruser = "SELECT subscription FROM `user` WHERE `myrid`='$sponser' ";
            $sponseruser_run=mysqli_query($conn,$sponseruser);
            if(mysqli_num_rows($sponseruser_run)==1){
                foreach($sponseruser_run as $sponseruser)
                {
                $sponsersub=$sponseruser['subscription'];
				$comm = "SELECT sbanefits FROM `subpacks` WHERE `sid`='$sponsersub' ";
            $comm_run=mysqli_query($conn,$comm);
            if(mysqli_num_rows($comm_run)==1){
                foreach($comm_run as $comm)
                {
                $banefits=$comm['sbanefits'];

                }
                }	
                }
                }	
				$commission=($banefits/100)*$price;
				$purchase = "SELECT id FROM `purchase` WHERE `orderid`='$orderid' ";
            $purchase_run=mysqli_query($conn,$purchase);
            if(mysqli_num_rows($purchase_run)==0){
				$insert = $conn->query("INSERT into purchase (purchasename, price ,orderid,p_rid,commission,sponser_rid) VALUES ('$coursename',' $price','$orderid','$myrid','$commission','$sponser')");
				if($insert){
					$couserenroled = "SELECT coursesenroled FROM `user` WHERE `uid`='$uid' ";
            $couserenroled_run=mysqli_query($conn,$couserenroled);
            if(mysqli_num_rows($couserenroled_run)==1){
                foreach($couserenroled_run as $couserenroled)
                {
					$myccourse=$couserenroled['coursesenroled'];
                }
                }
				$updatedcourses=$myccourse.",".$courseid;
				$arr=(array_filter(array_unique(explode(",",$updatedcourses))));
					$newupdatedcourses = implode(',', $arr);

				$csub = "SELECT subscription FROM `user` WHERE `uid`='$uid' ";
				$csub_run=mysqli_query($conn,$csub);
				if(mysqli_num_rows($csub_run)==1){
					foreach($csub_run as $csub)
					{
						$currentsub=$csub['subscription'];
					}
					}
					if($currentsub==null){
				
						$insertcourse = $conn->query("UPDATE user set subscription='1',coursesenroled='$newupdatedcourses',ispurchased='1' WHERE uid='$uid' ");
					}else {
						$insertcourse = $conn->query("UPDATE user set coursesenroled='$newupdatedcourses',ispurchased='1' WHERE uid='$uid' ");

					}
						if($insertcourse){
							echo' <script>alert("Transaction Successful")
							location.href = "/affilpro/home/courses/mycourses.php"
							</script>';
							exit();
}
				 }
			}else{
				echo' <script>alert("something went wrong \n contact to customer care")
				location.href = "/affilpro/login/"
				</script>';
				exit();

		 }			}else if($type=="subscription"){
			$subscriptionname=$decode->order_tags->subscriptionname;
			$subscriptionid=$decode->order_tags->subscriptionid;
			$mail = new PHPMailer(true);

			try{
				$mail->IsSMTP();
				$mail->Host= "smtp.gmail.com";
				$mail->Port       = 587;
				$mail->SMTPSecure = "tls";
				$mail->SMTPAuth   = true;       
				$mail->Username   = "certificate.affilpro@gmail.com";
				$mail->Password   = "hwqluzqhyvymacqg";
				$mail->SetFrom("certificate.affilpro@gmail.com", "piyush saini");
				$mail->AddAddress("$gmail", "$name");
				$mail->IsHTML(true); 
				$mail->Subject = "Purchase successfull";
				$content = "<b>hey $name </b> <br> Yor purchase has been sucussfull for <br> Order Id  	   $orderid<br>
																							  Price			  $price<br>
																							  Affiliate id 	  $myrid<br>
																							  Purchase 		  $subscriptionname Subscription";
				$mail->Body=$content; 
				if(!$mail->Send()) {
					echo "Error while sending Email.";
					var_dump($mail);
					} else {
		
						$msg="Check Email for further information";
					}
	
					} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
				?>
			?>
			<div class="container"> 
		<div class="panel panel-success">
		  <div class="panel-heading">Verification Successful</div>
		  
	
		</div>
		</div>
		<?php
			$sponseruser = "SELECT subscription FROM `user` WHERE `myrid`='$sponser' ";
            $sponseruser_run=mysqli_query($conn,$sponseruser);
            if(mysqli_num_rows($sponseruser_run)==1){
                foreach($sponseruser_run as $sponseruser)
                {
                $sponsersub=$sponseruser['subscription'];
				$comm = "SELECT sbanefits FROM `subpacks` WHERE `sid`='$sponsersub' ";
            $comm_run=mysqli_query($conn,$comm);
            if(mysqli_num_rows($comm_run)==1){
                foreach($comm_run as $comm)
                {
                $banefits=$comm['sbanefits'];

                }
                }	
                }
                }	
				$commission=($banefits/100)*$price;
				$purchase = "SELECT id FROM `purchase` WHERE `orderid`='$orderid' ";
            $purchase_run=mysqli_query($conn,$purchase);
            if(mysqli_num_rows($purchase_run)==0){
				$insert = $conn->query("INSERT into purchase (purchasename, price ,orderid,p_rid,commission,sponser_rid) VALUES ('$subscriptionname',' $price','$orderid','$myrid','$commission','$sponser')");
				if($insert){
					$couserenroled = "SELECT coursesenroled FROM `user` WHERE `uid`='$uid' ";
					$couserenroled_run=mysqli_query($conn,$couserenroled);
					if(mysqli_num_rows($couserenroled_run)==1){
						foreach($couserenroled_run as $couserenroled)
						{
							$myccourse=$couserenroled['coursesenroled'];
						}
						}
						$cin = "SELECT cin FROM `subpacks` WHERE `sid`='$subscriptionid' ";
						$cin_run=mysqli_query($conn,$cin);
						if(mysqli_num_rows($couserenroled_run)==1){
							foreach($cin_run as $cin)
							{
								$coursesin=$cin['cin'];
							}
							}
							
					$updatedcourses=$myccourse.",".$coursesin;
					
					$arr=(array_filter(array_unique(explode(",",$updatedcourses))));
					$newupdatedcourses = implode(',', $arr);


					$insertsub = $conn->query("UPDATE user set subscription='$subscriptionid',coursesenroled='$newupdatedcourses',ispurchased='1' WHERE uid='$uid' ");
if($insertsub){
	echo' <script>alert("Transaction Successful")
	location.href = "/affilpro/home/"
	</script>';
	exit();
}
				 }
			}else{
				echo' <script>alert("something went wrong \n contact to customer care")
				location.href = "/affilpro/login/"
				</script>';
				exit();

		 }			}else {
		?>
		<div class="container"> 
	<div class="panel panel-success">
	  <div class="panel-heading">Verification Failed</div>
	  

	</div>
	</div>
	<?php    }
	}else {?>
		<?php
$mail = new PHPMailer(true);

try {
		$mail->IsSMTP();
		$mail->Host= "smtp.gmail.com";
		$mail->Port       = 587;
		$mail->SMTPSecure = "tls";
		$mail->SMTPAuth   = true;       
		$mail->Username   = "certificate.affilpro@gmail.com";
		$mail->Password   = "hwqluzqhyvymacqg";
		$mail->SetFrom("certificate.affilpro@gmail.com", "piyush saini");
		$mail->AddAddress("$gmail", "$name");
		$mail->IsHTML(true); 
		$mail->Subject = "Payment Failed";
		$content = "<b>hey $name </b> <br> We are sorry to say your payment has been failed <br> Order .";
		$mail->Body=$content; 
		if(!$mail->Send()) {
			echo "Error while sending Email.";
			var_dump($mail);
			} else {

				$msg="Check Email for further information";
			}
			} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
        ?>
		<div class="container"> 
	<div class="panel panel-success">
	  <div class="panel-heading">Verification Failed</div>
	  <b>
		<center>
			<br>
			<img src="../image/failed.png" alt="">
			<br>
			<br>
	  <div >Due To Some reason payment has been failed</div>
	  <div ><?php echo $msg ?></div>
 
	  <div >If your balance has been deducted it will be reverse in 24 hours if not contact us @hjk</div>
<br>
	  <div >If you are faceing this issue kindly contact us at @hjk</div>
	  <br><br>
	<div><a href="../../home"><button  class="btn-render">Go Back To Home</button></a></div></center>
	<br><br>

</b>

	  

	</div>
	</div>
		<style>.btn-render {
      border-radius: 6px;
    background-color: rgb(105, 51, 211);
    color: rgb(255, 255, 255);
  border: none;
  font-size: 14px;
   padding: 11px 16px;
}
</style>
	<?php    }
}else {
    echo  $err;
}

?>
	
	