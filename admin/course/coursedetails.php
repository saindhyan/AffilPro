<?php
include "../includes/layout.php";
include "..\..\includes\loadcourse.php";
include "../includes/db.php"
?>

<link rel="stylesheet" type="text/css" href="..\banner\upload.css">

<?php
        if(isset($_GET['id']))
        {
            $cid=$_GET['id'];
            $course = "SELECT * FROM `course_available` WHERE `cid`='$cid' ";
            $course_run=mysqli_query($conn,$course);
            if(mysqli_num_rows($course_run)>0){
                foreach($course_run as $course)
                {
                    ?>

<h1>Edit course</h1>
    <form action="updatecourse.php" method="post" enctype="multipart/form-data">
      <label for="photo">Photo:</label>
      <input type="file" name="file"><br>
      <label for="id">id:</label>
      <input type="text" disabled name="cid" value="<?php echo $course['cid']; ?>"><br>

      <label for="name">Name:</label>
      <input type="text" id="Name" name="Name" value="<?php echo $course['cname']; ?>"><br>

      <label for="Price">original Price:</label>
      <input type="text" id="Price" name="original-price"value="<?php echo $course['coprice']; ?>"><br>
      <label for="Price">current Price:</label>
      <input type="text" id="Price" name="current-price"value="<?php echo $course['cprice']; ?>"><br>

      
      <label for="disc">short discription</label>
      <textarea  id="disc" name="sort-disc"><?php echo $course['disc']; ?></textarea><br>
      <label for="disc">long discription</label>
      <textarea  id="disc" name="long-disc"><?php echo $course['cdisc']; ?></textarea><br>

      <button type="submit" name="submit"value="upload">Submit</button>
    </form>

    <a href="deletecourse.php?id=<?php echo $course['cid']; ?>"><button >delete</button></a>

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