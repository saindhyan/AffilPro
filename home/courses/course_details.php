<?php
session_start();
include "..\includes/db.php";
?>
<head>
<meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<script src="https://kit.fontawesome.com/bac6ecf02c.js" crossorigin="anonymous"></script>
   
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
   <link rel="stylesheet" href="/affilpro/assets/css/style.css">
   <link rel="stylesheet" href="/affilpro/assets/css/swiper-bundle.css">
   <link rel="stylesheet" href="/affilpro/assets/css/mainStyle.css">
    <link href="/affilpro/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="/affilpro/assets/css/loginstyle.css" rel="stylesheet">
    <?php
    $flg=0;
    if(isset($_SESSION['uid']))
        {

            $uid=$_SESSION['uid'];
            $c = "SELECT coursesenroled FROM `user` WHERE `uid`='$uid' ";
            $c_run=mysqli_query($conn,$c);
            if(mysqli_num_rows($c_run)>0){
                foreach($c_run as $c)
                {
                    $string = $c['coursesenroled'];
                    $str_arr = explode (",", $string); 
                        $len = sizeof($str_arr);
                        
                        for($i = 0; $i < $len; ++$i) {
                       
                                $c_id=$str_arr[$i];
                                if($c_id==$_GET['id']){
                                   $flg=1;
                                }
                }
            }

        }
    }

    ?>       
<?php
 if(isset($_GET['id']))
        {

            $c_id=$_GET['id'];
            $course = "SELECT * FROM `course_available` WHERE `cid`='$c_id' ";
            $course_run=mysqli_query($conn,$course);
            if(mysqli_num_rows($course_run)>0){
                foreach($course_run as $course)
                {
                    ?>

<section class="main-section">
    <div class="col-12 pt-40">
        <div class="container">
            <div class="row">
                                 <div class="col-md-7">
                    
                    <div class='explore-information'>
                        <h3><?php echo $course['cname']; ?></h3>
                        <h6><?php echo $course['disc']; ?></h6>

                        <img src="../../assets/image/uploads/<?php echo $course['cicon']; ?>" style="width:100%;max-width:60%;">
                        <h3>Curriculum</h3>
                     <?php
                     $coursetable="course".$course['cid'];
                     $partcount=0;
                     $duration=0;
                     $part = "SELECT sectionname,duration FROM `$coursetable` ";
            $part_run=mysqli_query($conn,$part);
            if(mysqli_num_rows($part_run)>0){
                foreach($part_run as $part)
                {
                    $partcount=$partcount+1;
                    $duration=$duration+$part['duration'];
                     ?>   
                            <p class='mb-2'><i class='bi bi-check-circle-fill fs-6'></i> <span><?php echo $part['sectionname'] ?></span></p>   
                        
                       
                        <?php
                }
            }
                        ?>
                          
                        
                     
                        <h3>Course Description</h3>
                        <p class='mb-2 explore-text-p'><?php echo $course['cdisc']; ?></p>
                        <img src="../../assets/image/uploads/<?php echo $course['cicon']; ?>" alt="img" style="width:100%;max-width:60%;">
                    </div>
                </div>
                
                                            <div class="col-md-5 second-div-explore">
               <p class='explore-sale'>Sale</p>
               <h3 class='explore-price'><span>₹ <?php echo $course['cprice']; ?></span></h3>
               <div>
                <?php
               if($flg==1){
                ?>
                                <a href=""><button class="edu-sec-btn" type="button">Already Enrolled</button></a>

                <?php
               }else{
                ?>
                <a href="../payments/pay.php?course=<?php echo $course['cid'] ?>"><button class="edu-sec-btn" type="button">Buy Now</button></a>
<?php
               }?>
               </div>
               <div>
                <div class='explore-line'></div>
               </div>
                              <div class='mt-3'>
                              <p class='mb-1'><i class="bi bi-translate fs-6" ></i> <span class='text-span-explore' >Language-English</span></p>
                <p class='mb-1'><i class="bi bi-card-text"></i> <span class='text-span-explore'>Subtitles-No</span></p>
                <p class='mb-1'><i class="bi bi-tablet"></i> <span class='text-span-explore'>Use On Desktop, Tablet & Mobile</span></p>
                <p class='mb-1'><i class="bi bi-clock"></i> <span class='text-span-explore' >Full Lifetime Access</span></p>
                <p class='mb-1'><i class="bi bi-patch-check-fill"></i> <span class='text-span-explore' >Certificate Of Completion</span></p>
                <p class='mb-1'><i class="bi bi-patch-check-fill"></i> <span class='text-span-explore' ><?php echo $partcount ?> lessons (<?php echo $duration ?> Minutes)</span></p>
                <p class='mb-1'><i class="bi bi-emoji-smile"></i>  <span class='text-span-explore' >Learn at Your Own Pace</span></p>
               </div>

               
                </div>
                
            </div>
                    </div>
    </div>
    
    
</section>
<?php
                }
            }else
            {
                ?>
                <p>not found</p>
                <?php

            }

        }
    ?>
