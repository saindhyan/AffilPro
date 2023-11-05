<?php
$secretKey  = '6Ld5DBQlAAAAADuQQHe7ZjJjyxoykGpgrH-pG-yl'; 

include "..\includes\db.php";
session_start();
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
        // Decode JSON data of API response 
        $responseData = json_decode($verifyResponse); 
         
        // If the reCAPTCHA API response is valid 
if($responseData->success){ 
    if(isset($_POST["certinum"]) && !empty($_POST['certinum'])){
    $number="c_".$_POST['certinum'];
                $certificate = "SELECT name,course_name,genrated_on FROM `certificate` WHERE `certi_id`='$number' ";
                $certificate_run=mysqli_query($conn,$certificate);
                    if(mysqli_num_rows($certificate_run)==1) {
                        foreach($certificate_run as $certificate)
                        {
                            $date=$certificate['genrated_on'];
                            $name=$certificate['name'];
                            $course=$certificate['course_name'];



                            ?>
                            <html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Verified</h1> 
        <p>We Certify That The Certificate Number <br>Is Generated On <b><?php echo $date ?></b> For <b><?php echo strtoupper($name) ?> </b>Enrolled In <b><?php echo $course ?></b></p>
      </div>
    </body>
</html>
                            <?php
                        }
                    }else{
?>
 <html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i style="color:red;" class="cross">❌</i>
      </div>
        <h1 style="color:red;">Not Verified</h1> 
        <p>We Are Sorry We Dont Have Data For This Certificate</p>
      </div>
    </body>
</html>
<?php                    }
    
}else{
         echo' <script>alert("please enter Code")
         history.back()
        </script>';
            exit();
        }
  }else{
   echo' <script>alert("please enter Certificate number and ReCaptcha Carefully")
    history.back()
     </script>';
    exit();
    }
}else{
    echo' <script>alert("Enter ReCaptcha")
    history.back()
    </script>';
            exit(); 
}

    ?>
