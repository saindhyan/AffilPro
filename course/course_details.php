<?php
include "..\includes\header.php";
include "..\includes/db.php";
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

                        <img src="../assets/image/uploads/<?php echo $course['cicon']; ?>" style="width:100%;max-width:60%;">
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
                        <img src="../assets/image/uploads/<?php echo $course['cicon']; ?>" alt="img" style="width:100%;max-width:60%;">
                    </div>
                </div>
                
                                            <div class="col-md-5 second-div-explore">
               <p class='explore-sale'>Sale</p>
               <h3 class='explore-price'><span>₹ <?php echo $course['cprice']; ?></span></h3>
               <div>
               <a href="../login"><button class="edu-sec-btn" type="button">Buy Now</button></a>
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
<?php
include "..\includes/footer.php"
?>