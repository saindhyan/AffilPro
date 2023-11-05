<?php
include "..\includes\header.php";
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
                        <img src="../assets/image/uploads/<?php echo $sub['sicon']; ?>" style="width:100% ;max-width:50%;">
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
                              <a href="../course/course_details.php?id=<?php echo$course['cid']; ?>"> <p class='mb-2'><i class='bi bi-check-circle-fill fs-6'></i> <span><?php echo$course['cname']; ?></span></p></a>       

                         
                                                
                                            
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
                        <img src="../assets/image/uploads/<?php echo $sub['sicon']; ?>" alt="img" style="width:100%;max-width:50%;">
                    </div>
                </div>
                
                                            <div class="col-md-5 second-div-explore">
               <p class='explore-sale'>Sale</p>
               <h3 class='explore-price'><span>₹ <?php echo $sub['sprice']; ?></span></h3>
               <div>
               <a href="../login"><button class="edu-sec-btn" type="button">Buy Now</button></a>
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
<?php
include "..\includes/footer.php"
?>