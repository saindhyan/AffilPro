<?php
include "includes/header.php";
include "includes/db.php"

?>

  <main> 
  <!-- testing for carsol by-->
    <!-- end of testing for carsol  by-->
      <!-- hero-area-sart -->
      <section class="slider-area hero-height position-relative fix">
            <div id="carouselExampleIndicators" class="carousel slide mt-try-slider" data-bs-ride="carousel">
             
               <div class="carousel-inner  mt_banner_desktop">
     
                 <?php
                 $ch=true;
                 $startb="";
                   $query = $conn->query("SELECT * FROM banner ORDER BY bid DESC");

                  if($query->num_rows > 0){
                   while($row = $query->fetch_assoc()){
                   $imageURL = 'assets/image/uploads/'.$row["file_name"];
if($ch){
   $startb=$row['bid'];
   $ch=false;
}
                   ?>
                    <div class="carousel-item  try-banner"id="<?php echo $row["bid"]; ?>" data-interval="1000">       
                        <a href="<?php echo $row["link"]; ?>"><img style=" position: relative; width: 100vw;"src="<?php echo $imageURL; ?>" class='banner_desktop_img_view'  alt="..."></a>
                        <a href="<?php echo $row["link"]; ?>"><img src="<?php echo $imageURL; ?>" class='banner_mobile_img_view w-100'  alt="..."></a>
                   </div>
                   <script>
                       var element = document.getElementById(<?php echo $startb?>);
                      element.classList.add("active");
                     </script>
                   
                  <?php
                   }}
               ?>
               <button class="carousel-control-prev" onclick="prev();" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon try-banner-btn" aria-hidden="true"><i class="bi bi-caret-left-fill" style="color:black;font-size: 19px;"></i></span>
                  <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next"onclick="next();" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon try-banner-btn" aria-hidden="true"><i class="bi bi-caret-right-fill" style="color:black;font-size: 19px;"></i></span>
                  <span class="visually-hidden">Next</span>
               </button>
            </div>
            
            <!--mobile view-->
      </section> 
      <!--secodn try  -->
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
               include "includes/loadsubs.php";

                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                    <div class="swiper-slide main-shy-div">
                     <div class="testimonial-items position-relative">
                     <a href="/AFFILPRO/SUBSCRIPTIONS/subscriptiondetails.php?id=<?php echo $row['sid']?>">
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
                           <p class='ms-2 fw'><?php echo $row['sbanefits']?> % commission<br>+ Complementry Courses</p>
                           </div>
                        </div>
                        <div class="try-img1">
                            <img src="assets/image/uploads/<?php echo $row["sicon"]; ?>" alt="img" class="try-img-course1">
                        </div>
                       
                        <div class="package-img">
                        <img src="assets/image/Package1646364247.png" alt="">
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
                         

                           
     
         <div class=" container-fluid p-3">
       <?php
       include "includes\loadcourse.php";
         while($row = mysqli_fetch_assoc($course_result)){
       ?>
        <div class=" col-12 bg-body rounded bg-light" style="overflow: hidden; box-shadow: 0 0 10px rgb(0 0 0 / 20%);border: 1px solid #fff !important;">
            <div class=" d-flex row p-3">
                    <div class="d-flex col-md-6">
                        <div class="col text-center">
                            <img src="assets/images/212.png" alt="limg" style="width: 100%;">
                           
                           <p class="course-name"><?php echo $row["cname"]; ?></p>
                        

                        </div>
                        <div  class="col mt-4 text-center">
                            <img src="assets/image/uploads/<?php echo $row["cicon"]; ?>" alt="img" class="try-img-course">
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                       <h2 class="try-text mb-1"><?php echo $row["disc"]; ?></h2>
                        <img src="assets/images/gp6.png" alt="img" style="width: 100%;" class='explore-img-mt'>
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
                                <p class='mt-price-course mb-0 mt-1'><span>₹<del style='color:grey;'><?php echo $row["coprice"]; ?></del><br>₹<?php echo $row["cprice"]; ?>/-</span></p>
                            </div>
                        </div>
                        </div>
                    <div class=" col-md-3 try-width-mt">
                     <div class="text-center pb-3 try-btn-mt">
                        <a href="course/course_details.php?id=<?php echo $row["cid"]; ?>">
                           <button type="button" class=" btn btn-outline-primary rounded-pill fw-bold w-100 shadow-none" >View
                           Details</button>
                        </a>
                     </div>
                     <div  class="text-center try-btn-mtw ">
                <a href="../login.php">
                     <button  type="button" class=" btn btn-warning rounded-pill w-100  shadow-none fw-bold"
                        >Enroll Now</button> </a>
               </div>
                    </div>
                </div>
                
        </div>
        <?php
        }
        ?>
      
    </div>
   <!-- try course code end -->
<!--our media code start-->
<div class="testimonial-area ">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3">
                  <div class="section-title text-center">
                     <h2>Our Media Presence</h2>
                  </div>
               </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container testimonial-active">
               <!-- Additional required wrapper -->
               <div class="swiper-wrapper">
                  <!-- Slides -->
                 
                 
                  <div class="swiper-slide main-shy-div media_headding">
                      <div class="testimonial-items position-relative">
                      <h1 style="text-align:center"> Comming Soon </h1> <div class='media_img'>
                         <img src='assets/images/hindustan_times.png' class='fluid-img'>
                     </div>
                     </div>
                  </div>
               </div>
               <!-- If we need pagination -->
               <div class="testimonial-pagination text-center"></div>
            </div>
         </div>
      </div>
<!--our medea code end-->
<!--faq start-->


<div class='main_faq' style="font-family: 'Poppins', sans-serif; font-size:20px;">
    <div class='container-xl main_heading_faq'>
        <h2 class='text-center'>Frequently Asked Questions</h2>
        <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item shadow-sm">
      
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed faq_btn" style="font-family: 'Poppins', sans-serif; font-size:20px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
      What is AFFILPRO? 
      </button>
    </h2>
    
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body" style="margin-left: 20px;">AFFILPEO is a skill-based ed-tech company that offers online courses
      to help individuals develop the skills they need to become successful entrepreneurs and investors.</div>
    </div>
  </div>
  
  <div class="accordion-item shadow-sm">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed faq_btn " style="font-family: 'Poppins', sans-serif; font-size:20px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        What kind of courses does the AFFILPRO offer?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body" style="margin-left: 20px;">AFFILPRO offers a range of courses on topics such as entrepreneurship, investing, marketing, sales, and personal development.</div>
    </div>
  </div>
  <div class="accordion-item shadow-sm">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed faq_btn " type="button"  style="font-family: 'Poppins', sans-serif; font-size:20px"data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
       Is there a refund policy for AFFILPRO courses?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body" style="margin-left: 20px;">Yes, AFFILPRO offers a refund policy for their courses. However,
      the specifics of the policy may vary depending on the course.
      It is important to review the policy before enrolling in a course.</div>
    </div>
  </div>
</div>
</div>
</div>

<!--faq end-->
       <!-- testimonial-area-start -->
       <div class="testimonial-area ">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 offset-lg-3">
                  <div class="section-title text-center">
                     <h2>What Students<br>
                        Think and Say About Us <span ></span></h2>
                  </div>
               </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container testimonial-active">
               <!-- Additional required wrapper -->
               <div class="swiper-wrapper">
                  <!-- Slides -->
                    
                  
                  
                    
                  
                    
                    <div class="swiper-slide main-shy-div">
                     <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                           <div class="testimonial-img">
                              <img src="assets/img/testimonial/ankit.png" alt="image not found">
                           </div>
                           <div class="testimonial-title">
                              <h4>Ankit Kumar </h4>
                              <span>Student</span>
                           </div>
                        </div>
                        <div class="testimoni-quotes">
                           <!-- <img src="assets/img/testimonial/quotes.png" alt="image not found"> -->
                        </div>
                        <div class="testimonial-body">
                           <h3>Helpful Instructors !</h3>
                           <p>Here, you can learn Ads Marketing, Social Media Marketing, Public Dealing, and Communication Skills. So, 
                           I recommend you to learn and generate higher revenue after learning through this platform.</p>
                        </div>
                        <div class="testimonial-icon">
                           <i class="fas fa-star" style="color:#0265b5;"></i>
                           <i class="fas fa-star" style="color:#0265b5;"></i>
                           <i class="fas fa-star"style="color:#0265b5;"></i>
                           <i class="fas fa-star" style="color:#0265b5;"></i>
                        </div>
                     </div>
                    </div>
               </div>
               
               <!-- If we need pagination -->
               <div class="testimonial-pagination text-center"></div>
            </div>
         </div>
      </div>
      <!-- testimonial-area-end -->
      <script>
         function next(){
            var element = document.getElementById('<?php echo $row["bid"];?>+1');
                     element.classList.add("active");
                     var element2 = document.getElementById('<?php echo $row["bid"];?>');
                     element.classList.remove("active");
         }
         function prev(){
            var element = document.getElementById('<?php echo $row["bid"];?>-1');
                     element.classList.add("active");
                     var element2 = document.getElementById('<?php echo $row["bid"];?>');
                     element.classList.remove("active");
         }
                     
                     
   </main>
   <?php
   include "includes/footer.php"
   ?>