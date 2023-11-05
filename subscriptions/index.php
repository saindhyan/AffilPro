<?php
include "..\includes\header.php"
?>
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
               include "..\includes/loadsubs.php";

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
                            <img src="..\assets/image/uploads/<?php echo $row["sicon"]; ?>" alt="img" class="try-img-course1">
                        </div>
                       
                        <div class="package-img">
                        <img src="..\assets/image/Package1646364247.png" alt="">
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
          
<?php
include "..\includes/footer.php"
?>