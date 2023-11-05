<!doctype html>
<html class="no-js" lang="zxx">

<head>
<meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AFFIL PRO</title>
    <script src="https://kit.fontawesome.com/bac6ecf02c.js" crossorigin="anonymous"></script>
   
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
   <link rel="stylesheet" href="/affilpro/assets/css/style.css">
   <link rel="stylesheet" href="/affilpro/assets/css/swiper-bundle.css">
   <link rel="stylesheet" href="/affilpro/assets/css/mainStyle.css">
    <link href="/affilpro/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="/affilpro/assets/css/loginstyle.css" rel="stylesheet">
</head><body>   
   <div class="body-overlay"></div>
   <div class="fix">
      <div class="side-info">
         <div class="side-info-content">
            <div class="offset-widget offset-logo mb-40">
               <div class="row align-items-center">
                  <div class="col-9">
                     <a href="index.html">
                        <img src="/affilpro/assets/images/logo.png" alt="Logo" width = "100px">
                     </a>
                  </div>
                  <div class="col-3 text-end"><button class="side-info-close"><i class="fa fa-close"></i></button>
                  </div>
               </div>
            </div>
            <div class="mobile-menu d-xl-none fix"></div>
         </div>
      </div>
   </div>
   <!-- side toggle end -->
   <!-- header note area end -->
   <!-- header-area-start  -->
   








   
   






   
   
<?php
include "..\includes\db.php";

?>
<?php
 if(isset($_GET['id']))
        {
            $cincount=0;
            $s_id=$_GET['id'];
            $sub = "SELECT * FROM `subpacks` WHERE `sid`='$s_id' ";
            $sub_run=mysqli_query($conn,$sub);
            if(mysqli_num_rows($sub_run)>0){
                foreach($sub_run as $sub)
                {
                    $cin= $sub['cin'];
                    ?>
<section class="main-section">
    <div class="col-12 pt-40">
        <div class="container">
            <div class="row">
                                 <div class="col-md-7">
                    
                    <div class='explore-information'>
                        <h3><?php echo $sub['sname']; ?> Pack</h3>
                        <img src="../../assets/image/uploads/<?php echo $sub['sicon']; ?>" style="width:100% ;max-width:50%;">
                        <h3>Courses included</h3>
                        
                    <?php 
                    $string = $cin;
                    $str_arr = explode (",", $string); 
                        $len = sizeof($str_arr);
                        
                        for($i = 0; $i < $len; ++$i) {
                        ?>
                                <?php
                                $c_id=$str_arr[$i];
                                if(empty($c_id)){
                                    ?>
                                    <p>
                                        no courses included
                                    </p>
                                    <?php
                            }else{
                                    $cincount=$cincount+1;
                                    $course = "SELECT * FROM `course_available` WHERE `cid`='$c_id' ";
                                    $course_run=mysqli_query($conn,$course);
                                    if(mysqli_num_rows($course_run)>0){
                                        foreach($course_run as $course)
                                        {
                                ?>
                              <a href="course_details.php?id=<?php echo$course['cid']; ?>"> <p class='mb-2'><i class='bi bi-check-circle-fill fs-6'></i> <span><?php echo$course['cname']; ?></span></p></a>       

                         
                                                
                                            
                                            <?php
                                    }
                                }else
                                {
                                    

                                }
                            }
                        ?>
    
                    <?php
                     } 
                     ?>
                        <h3>Course Description</h3>
                        <p class='mb-2 explore-text-p'><?php echo $sub['sdisc']; ?></p>
                        <img src="../../assets/image/uploads/<?php echo $sub['sicon']; ?>" alt="img" style="width:100%;max-width:50%;">
                    </div>
                </div>
                
                                            <div class="col-md-5 second-div-explore">
               <p class='explore-sale'>Sale</p>
               <h3 class='explore-price'><span>₹ <?php echo $sub['sprice']; ?></span></h3>
               <div>
               <a href="../payments/pay.php?sub=<?php echo $sub['sid']?>"><button class="edu-sec-btn" type="button">Buy Now</button></a>
               </div>
               <div>
                <div class='explore-line'></div>
               </div>
                              <div class='mt-3'>
                <p class='mb-1'><i class="bi bi-translate fs-6" ></i> <span class='text-span-explore' >Courses Included - <?php echo $cincount; ?> (as mentioned)</span></p>
                <p class='mb-1'><i class="bi bi-card-text"></i> <span class='text-span-explore'><?php echo $sub['sbanefits']; ?> % Commission from your referrals</span></p>
                <p class='mb-1'><i class="bi bi-tablet"></i> <span class='text-span-explore'>User can apply for additional benefits (upto 100% commission)</span></p>
                <p class='mb-1'><i class="bi bi-clock"></i> <span class='text-span-explore' >24 Hours guidance and support </span></p>
            <!--    <p class='mb-1'><i class="bi bi-patch-check-fill"></i> <span class='text-span-explore' >Certificate Of Completion</span></p>
                <p class='mb-1'><i class="bi bi-patch-check-fill"></i> <span class='text-span-explore' >51 lessons (15 Hr. 18 Min. )</span></p>
                <p class='mb-1'><i class="bi bi-emoji-smile"></i>  <span class='text-span-explore' >Learn at Your Own Pace</span></p>
                    -->     </div>

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
 <script>
$(document).ready(function(){
     $("#flush-collapseOne").hide();
  $("#flush-headingOne").click(function(){
    $("#flush-collapseOne").toggle();
  });
});

$(document).ready(function(){
     $("#flush-collapseTwo").hide();
  $("#flush-headingTwo").click(function(){
    $("#flush-collapseTwo").toggle();
  });
});

$(document).ready(function(){
     $("#flush-collapseThree").hide();
  $("#flush-headingThree").click(function(){
    $("#flush-collapseThree").toggle();
  });
});


</script>
   <!-- footer-area-end -->


   <!-- JS here -->
   <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63ca6081c2f1ac1e202eb0ad/1gn78hve1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <script src="/affilpro/assets/js/vendor/jquery-3.6.0.min.js"></script>
    
  <script src="/affilpro/assets/js/vendor/waypoints.min.js"></script>
   <script src="/affilpro/assets/js/bootstrap.bundle.min.js"></script>
   <script src="/affilpro/assets/js/meanmenu.js"></script>
   <script src="/affilpro/assets/js/swiper-bundle.min.js"></script>
   <script src="/affilpro/assets/js/owl.carousel.min.js"></script>
   <script src="/affilpro/assets/js/magnific-popup.min.js"></script>
   <script src="/affilpro/assets/js/huicalendar.js"></script>
   <script src="/affilpro/assets/js/parallax.min.js"></script>
   <script src="/affilpro/assets/js/backToTop.js"></script>
   <script src="/affilpro/assets/js/nice-select.min.js"></script>
   <script src="/affilpro/assets/js/counterup.min.js"></script>
   <script src="/affilpro/assets/js/ajax-form.js"></script>
   <script src="/affilpro/assets/js/wow.min.js"></script>
   <script src="/affilpro/assets/js/isotope.pkgd.min.js"></script>
   <script src="/affilpro/assets/js/imagesloaded.pkgd.min.js"></script>
   <script src="/affilpro/assets/js/main.js"></script>
   <script src="../cdn.jsdelivr.net/npm/%40popperjs/core%402.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="../cdn.jsdelivr.net/npm/bootstrap%405.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 

</body>

<!-- Mirrored from millionairetrack.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Mar 2023 07:14:39 GMT -->
</html>