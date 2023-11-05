
<?php
include "../includes/db.php";
if(isset($_GET['course'])){
  $courseid=$_GET['course'];
  $orderid=date('y'.'m'.'d'.'H'.'i'.'s');
  $appid="TEST3543761364010b795cd3ce9193673453";
  $secretkey="TEST59d7217106d927616a6ec66b8eba3dd391af4ba8";
  $url="https://sandbox.cashfree.com/pg/orders";
  $returnurl="https://sandbox.cashfree.com/pg/orders";
  session_start();
  $uid=$_SESSION['uid'];
  $user = "SELECT * FROM `user` WHERE `uid`='$uid' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)==1){
                foreach($user_run as $user)
                {
                $name=$user['name'];
                $phone=$user['mobile'];
                $email=$user['email'];
                $rid=$user['myrid'];  
                $sponser=$user['referral_id'];    
  
    

                }
                }else{
                  echo' <script>alert("Something Went wrong")
                  history.back()
                  </script>';
                  exit();
                }
            
            $course = "SELECT * FROM `course_available` WHERE `cid`='$courseid' ";
            $course_run=mysqli_query($conn,$course);
            if(mysqli_num_rows($course_run)==1){
                foreach($course_run as $course)
                {
                $price=$course['cprice'];  
                $cname=$course['cname'];  


                

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Content-Type: application/json",
              "x-api-version: 2022-09-01",
              "x-client-id: $appid",
              "x-client-secret:$secretkey"
            ));

$data = <<< JSON
  {
      "order_id": "order_$orderid",
      "order_amount": "$price",
      "order_currency": "INR",
      "order_note": "Course - $cname AFID - $rid sponser - $sponser", 
      "order_tags":{
        "type":"course",
        "courseid":"$courseid",
        "coursename":"$cname",
        "myrid":"$rid",

        "sponser":"$sponser"


      },
      "customer_details": {
      "customer_id": "$uid",
        "customer_name": "$name",
        "customer_email": "$email",
        "customer_phone": "$phone"
      },
      "order_meta": {
        "return_url": "http://localhost/affilpro/home/payments/response.php?orderid={order_id} ",
        "notify_url": null,
        "payment_methods": null
      }
  }
  JSON;
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
if ($err) {
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode(array("error" => 1));
  echo "cURL Error #:" . $err;
  die();

}else {
  $decode=json_decode($response);
  $sessionid=$decode->payment_session_id;
}
?>

    </style>
  
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirecting</title>
</head>

<body>
  <center> <div class="ld_container">
      <div class="ld_text_container">
      <img class="ld_icon" src="../image/paymenticon.png" >
  </img>
    
        <h2>
          Hold On
        </h2>
        <p>
            Dont press Back button
  </p>
        <p>
            We are redirecting you now...
        </p>
        <input hidden type="text" placeholder="order_token" id="paymentSessionId" value="<?php echo $sessionid?>" class="inputText">
  <br>
  <button class="btn-render" onclick=render()>click if not redirected</button>
  </div>
  <hr>
        </div>
    </div></center>
</body>

</html> 

<script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.sandbox.js"></script>
<script>window.onload = function () {
  let paymentSessionId = document.getElementById("paymentSessionId").value;
  if (paymentSessionId == "") {
    alert("No session_id specified");
    return
  };
const cf = new Cashfree(paymentSessionId);
  cf.redirect();
  };</script>
<style>
 .ld_icon {
  width: 150px;
  height: 150px;
}

.ld_text {
  margin-top: 30px;
}

.ld_text_container h2 {
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 40px;
  margin: 10px;
  margin-top: 80px;
}

.ld_text_container h4 {
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 24px;
  margin: 14px;
}

.ld_text_container p {
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 16px;
  margin: 14px;
}

.ld_text_container {
  width: 300px;
  margin-left: auto;
  margin-right: auto;
}

.ld_container {
  width: 100%;
}

@media (min-width: 960px) {
  .ld_icon {
    position: relative;
    top: 50px;
  }

  .ld_text {
    display: inline;
    height: 250px;
    line-height: 250px;
    margin-left: 50px;
  }

  .ld_text_container {
    width: 960px;
  }
}

.btn-render {
      border-radius: 6px;
    background-color: rgb(105, 51, 211);
    color: rgb(255, 255, 255);
  border: none;
  font-size: 14px;
   padding: 11px 16px;
}

  </style>
    <script>function render() {
  let paymentSessionId = document.getElementById("paymentSessionId").value;
  if (paymentSessionId == "") {
    alert("No session_id specified");
    return
  };
const cf = new Cashfree(paymentSessionId);
  cf.redirect();
  };</script>
  <?php
 }
} else{
  echo' <script>alert("Course Not Found")
                  history.back()
                  </script>';
                  exit();
}
}else if(isset($_GET['sub'])){
  $subid=$_GET['sub'];
  $orderid=date('y'.'m'.'d'.'H'.'i'.'s');
  $appid="TEST3543761364010b795cd3ce9193673453";
  $secretkey="TEST59d7217106d927616a6ec66b8eba3dd391af4ba8";
  $url="https://sandbox.cashfree.com/pg/orders";
  $returnurl="https://sandbox.cashfree.com/pg/orders";
  session_start();
  $uid=$_SESSION['uid'];
  $user = "SELECT * FROM `user` WHERE `uid`='$uid' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)==1){
                foreach($user_run as $user)
                {
                $name=$user['name'];
                $phone=$user['mobile'];
                $email=$user['email'];
                $rid=$user['myrid'];  
                $sponser=$user['referral_id'];    
  
    

                }
                }else{
                  echo' <script>alert("Something Went wrong")
                  history.back()
                  </script>';
                  exit();
                }
            
            $sub = "SELECT * FROM `subpacks` WHERE `sid`='$subid' ";
            $sub_run=mysqli_query($conn,$sub);
            if(mysqli_num_rows($sub_run)==1){
                foreach($sub_run as $sub)
                {
                $price=$sub['sprice'];  
                $sname=$sub['sname'];  


                

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              "Content-Type: application/json",
              "x-api-version: 2022-09-01",
              "x-client-id: $appid",
              "x-client-secret:$secretkey"
            ));

$data = <<< JSON
  {
      "order_id": "order_$orderid",
      "order_amount": "$price",
      "order_currency": "INR",
      "order_note": "Subscription - $sname AFID - $rid sponser - $sponser", 
      "order_tags":{
        "type":"subscription",
        "subscriptionid":"$subid",
        "subscriptionname":"$sname",
        "myrid":"$rid",
        "sponser":"$sponser"

      },
      "customer_details": {
      "customer_id": "$uid",
        "customer_name": "$name",
        "customer_email": "$email",
        "customer_phone": "$phone"
      },
      "order_meta": {
        "return_url": "http://localhost/affilpro/home/payments/response.php?orderid={order_id} ",
        "notify_url": null,
        "payment_methods": null
      }
  }
  JSON;
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);
if ($err) {
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode(array("error" => 1));
  echo "cURL Error #:" . $err;
  die();

}else {
  $decode=json_decode($response);
  $sessionid=$decode->payment_session_id;
}
?>

    </style>
  
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redirecting</title>
</head>

<body>
  <center> <div class="ld_container">
      <div class="ld_text_container">
      <img class="ld_icon" src="../image/paymenticon.png" >
  </img>
    
        <h2>
          Hold On
        </h2>
        <p>
            Dont press Back button
  </p>
        <p>
            We are redirecting you now...
        </p>
        <input hidden type="text" placeholder="order_token" id="paymentSessionId" value="<?php echo $sessionid?>" class="inputText">
  <br>
  <button class="btn-render" onclick=render()>click if not redirected</button>
  </div>
  <hr>
        </div>
    </div></center>
</body>

</html> 

<script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.sandbox.js"></script>
<script>window.onload = function () {
  let paymentSessionId = document.getElementById("paymentSessionId").value;
  if (paymentSessionId == "") {
    alert("No session_id specified");
    return
  };
const cf = new Cashfree(paymentSessionId);
  cf.redirect();
  };</script>
<style>
 .ld_icon {
  width: 150px;
  height: 150px;
}

.ld_text {
  margin-top: 30px;
}

.ld_text_container h2 {
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 40px;
  margin: 10px;
  margin-top: 80px;
}

.ld_text_container h4 {
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 24px;
  margin: 14px;
}

.ld_text_container p {
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 16px;
  margin: 14px;
}

.ld_text_container {
  width: 300px;
  margin-left: auto;
  margin-right: auto;
}

.ld_container {
  width: 100%;
}

@media (min-width: 960px) {
  .ld_icon {
    position: relative;
    top: 50px;
  }

  .ld_text {
    display: inline;
    height: 250px;
    line-height: 250px;
    margin-left: 50px;
  }

  .ld_text_container {
    width: 960px;
  }
}

.btn-render {
      border-radius: 6px;
    background-color: rgb(105, 51, 211);
    color: rgb(255, 255, 255);
  border: none;
  font-size: 14px;
   padding: 11px 16px;
}

  </style>
    <script>function render() {
  let paymentSessionId = document.getElementById("paymentSessionId").value;
  if (paymentSessionId == "") {
    alert("No session_id specified");
    return
  };
const cf = new Cashfree(paymentSessionId);
  cf.redirect();
  };</script>
  <?php
 }
} else{
  echo' <script>alert("Something Went wrong")
  history.back()
  </script>';
  exit();
}
}else{
  echo' <script>alert("Something Went wrong")
  history.back()
  </script>';
  exit();
}
    ?>