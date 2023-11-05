<?php
include "..\includes/header.php";
?>
 <main>
<div class=" container-fluid p-3">
      
        <div class="course-div">
         <img src="../assets/img/slider/online%20course.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
      </div> <!--code by anil for course   -->
      <?php
       include "..\includes\loadcourse.php";
         while($row = mysqli_fetch_assoc($course_result)){
       ?>
             <div class=" container-fluid p-3">
        <div class=" col-12 bg-body rounded bg-light" style="overflow: hidden; box-shadow: 0 0 10px rgb(0 0 0 / 20%);border: 1px solid #0265b5 !important;">
            <div class=" d-flex row p-3">
                    <div class="d-flex col-md-6">
                        <div class="col text-center">
                            <img src="..\assets/images/212.png" alt="limg" style="width: 100%;">
                           <p class="course-name"><?php echo $row['cname']?></p>
                        </div>
                        <div  class="col mt-4 text-center">
                            <img src="..\assets/image/uploads/<?php echo $row['cicon']?>" alt="img" class="try-img-course">
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                       <h2 class="try-text mb-1"><?php echo $row['disc']?></h2>
                        <img src="..\assets/images/gp6.png" alt="img" style="width: 100%;" class='explore-img-mt'>
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
                <a href="../login">
                     <button type="button" class=" btn btn-warning rounded-pill w-100  shadow-none fw-bold"
                        >Enroll Now</button> </a>
                     </div>
                    </div>
                </div>
    
         
        </div>
        <?php
         }
        ?>
    </div>
         </main>
     <?php
include "..\includes/footer.php";
?>