
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
   








   
   
<main>
<div class="testimonial-area pb-120 pt-50">
         <div class="container-xl">
            <div class='d-flex col-12'>
                <div class='col-md-4 first_mt'>
                    <h2></h2>
                </div>
                 <div class='col-md-4 mobile-headdinh_bundle'>
                  <h2>Subscription Pack</h2>
             </div>
             <div class='col-md-4 second_mt'>
                 <h2></h2>
             </div>
            </div>
            <div class=" d-flex col-12 desktop-headding_bundle">
                <div class='col-md-5'>
                    
                    <div class='hr-mt-line'></div>
                </div>
                <div class='col-md-2'>
                    <p class='bundle-name-register text-center'>Subscription Pack</p>
                </div>
                <div class='col-md-5'>
                    
                     <div class='hr-mt-line'></div>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container testimonial-active">
               <!-- Additional required wrapper -->
               <div class="swiper-wrapper">
               <?php
               include "../..\includes/loadsubs.php";

                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                    <div class="swiper-slide main-shy-div">
                     <div class="testimonial-items position-relative">
                     <a href="subscriptiondetails.php?id=<?php echo $row['sid']?>">
                        <div class="testimonial-header">
                          
                           <div class="testimonial-title">
                              <span class="bandle-name"><?php echo $row['sname']?></span>
                              <span>Rating</span>
                           <div class='d-flex'>
                              <span><i class="bi bi-star-fill fs-6" style="color:#0265b5;"></i></span>
                              <span><i class="bi bi-star-fill fs-6" style="color:#0265b5;"></i></span>
                              <span><i class="bi bi-star-fill fs-6" style="color:#0265b5;"></i></span>
                              <span><i class="bi bi-star-half fs-6" style="color:#0265b5;"></i></span>
                           </div>
                           <div class='d-flex'>
                           <p class='ms-2 fw-bold'>₹<?php echo $row['sprice']?></p>
                           </div>
                              <h6 class="bandle-name">Benefits</h6>
                           <p class='ms-2 fw'><?php echo $row['sbanefits']?> commission<br>+ Complementry Courses</p>
                           </div>
                        </div>
                        <div class="try-img1">
                            <img src="../..\assets/image/uploads/<?php echo $row["sicon"]; ?>" alt="img" class="try-img-course1">
                        </div>
                       
                        <div class="package-img">
                        <img src="../..\assets/image/Package1646364247.png" alt="">
                           </div>
                         </a>
                     </div>
                    </div>
                    <?php
                        }
                        ?>
                </div>
               <!-- If we need pagination -->

               <div class="testimonial-pagination text-center"></div>
            </div>
         </div>
      </div>
                    </main>

                    <main>
<div class=" container-fluid p-3">
       <?php
       include "../..\includes\loadcourse.php";
         while($row = mysqli_fetch_assoc($course_result)){
       ?>
        <!--code by anil for course   -->
             <div class=" container-fluid p-3">
        <div class=" col-12 bg-body rounded bg-light" style="overflow: hidden; box-shadow: 0 0 10px rgb(0 0 0 / 20%);border: 1px solid #0265b5 !important;">
            <div class=" d-flex row p-3">
                    <div class="d-flex col-md-6">
                        <div class="col text-center">
                            <img src="../..\assets/images/212.png" alt="limg" style="width: 100%;">
                           <p class="course-name"><?php echo $row['cname']?></p>
                        </div>
                        <div  class="col mt-4 text-center">
                            <img src="../..\assets/image/uploads/<?php echo $row['cicon']?>" alt="img" class="try-img-course">
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                       <h2 class="try-text mb-1">A new way to transform your business.</h2>
                        <img src="../..\assets/images/gp6.png" alt="img" style="width: 100%;" class='explore-img-mt'>
                        <div class='row'>
                            <div class='col-md-6 start_main_div'>
                                <p class='mb-1 mt-1'>
                                    <span><i class="bi bi-star-fill" style="color:#0265b5;"></i></span>
                                    <span><i class="bi bi-star-fill" style="color:#0265b5;"></i></span>
                                    <span><i class="bi bi-star-fill" style="color:#0265b5;"></i></span>
                                    <span><i class="bi bi-star-fill" style="color:#0265b5;"></i></span>
                                    <span><i class="bi bi-star-half" style="color:#0265b5;"></i></span>
                                </p>
                            </div>
                            <div class='col-md-6'>
                                <p class='mt-price-course mb-0 mt-1'><span>₹<del style='color:grey;'><?php echo $row['coprice']?></del><br><?php echo $row['cprice']?>/-</span></p>
                            </div>
                        </div>
                        </div>
                    <div class=" col-md-3 try-width-mt">
                     <div class="text-center pb-3 try-btn-mt">
                        <a href="course_details.php?id=<?php echo $row['cid']?>">
                           <button type="button" class=" btn btn-outline-primary rounded-pill fw-bold w-100 shadow-none" style='border:1px solid #0265b5 !important'>View
                           Details</button>
                        </a>
                     </div>
                     <div  class="text-center try-btn-mt">
                <a href="../payments/pay.php?course=<?php echo $row['cid']?>">
                     <button type="button" class=" btn btn-warning rounded-pill w-100  shadow-none fw-bold"
                        >Buy Now</button> </a>
                     </div>
                    </div>
                </div>
    
         
        </div>
        <?php
         }
        ?>
    </div>
         </main>
          
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

