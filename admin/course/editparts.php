<?php
include "../includes/layout.php";
include "..\..\includes\loadcourse.php";
include "../includes/db.php";
?>



               
         
                <link rel="stylesheet" type="text/css" href="..\banner\upload.css">
                <?php
$coursen=$_GET['id'];
?>
<h1>Edit course <?php echo $coursen?></h1>
    <form action="uploadpart.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
      
      <label for="name">Section name:</label>
      <input type="text" id="Name" name="Name" value=""><br>

      <label for="duration">duration:(in minutes only number)</label>
      <input type="text" id="duration" name="duration"value=""><br>
      <label for="Link">Link</label>
      <input type="text" id="Link" name="Link"value=""><br>
      <button type="submit" name="submit"value="upload">Submit</button>
    </form>


      <h2 style="  margin-top: 2%;">Edit course parts</h2>

                    <table style="  margin-top: 2%;" class="tablemargin"  id="usertab">
                        <tr >
                            <th>Section Name</th>
                            <th>duration</th>
                            <th>Link</th>
                            <th>ID</th>
                        
                            <th></th>
                            <th></th>

                        </tr>
                        
                        <?php
                        
        if(isset($_GET['id']))
        {
            $coursetable="course".$_GET['id'];
            $course = "SELECT * FROM $coursetable  ";
            $course_run=mysqli_query($conn,$course);
            if(mysqli_num_rows($course_run)>0){
                foreach($course_run as $course)
                {
                    ?>
                        <tr>
                            <td><?php echo $course['sectionname']?></td>
                            <td><?php echo $course['duration']?></td>
                            <td><?php echo $course['link']?></td>
                            <td><?php echo $course['id']?></td>
                           

                            <td>
                            <a href="editpartdetails.php?course=<?php echo $_GET['id']?>&part=<?php echo $course['id']?>"><div class="select">edit details</div></a></td>
                            <td>
                            <a href="deletepart.php?course=<?php echo $_GET['id']?>&part=<?php echo $course['id']?>"><div class="select">Delete </div></a></td>
                          
                        </tr>
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
                       

                    </table>
                </div>