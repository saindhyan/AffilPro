<?php
include "../includes/layout.php";
include "..\..\includes\loadcourse.php";
include "../includes/db.php";
?>



               
         
                <link rel="stylesheet" type="text/css" href="..\banner\upload.css">
  
        <?php        if(isset($_GET['course'])&&isset($_GET['part']))
        {  $part=$_GET['part'];
            $coursetable="course".$_GET['course'];
            $course = "SELECT * FROM $coursetable WHERE id='$part' ";
            $course_run=mysqli_query($conn,$course);
            if(mysqli_num_rows($course_run)>0){
                foreach($course_run as $course)
                {
                    ?>
                                    <h1>Edit part <?php echo $_GET['part'] ?> </h1>

    <form action="updatepart.php?course=<?php echo $_GET['course'] ?>&part=<?php echo $_GET['part'] ?>" method="post" enctype="multipart/form-data">
      
      <label for="name">Section name:</label>
      <input type="text" id="Name" name="Name" value="<?php echo $course['sectionname'] ?>"><br>

      <label for="duration">duration:(in minutes only number)</label>
      <input type="text" id="duration" name="duration"value="<?php echo $course['duration'] ?>"><br>
      <label for="Link">Link</label>
      <input type="text" id="Link" name="Link"value="<?php echo $course['link'] ?>"><br>
      <button type="submit" name="submit"value="upload">Submit</button>
    </form>

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
             