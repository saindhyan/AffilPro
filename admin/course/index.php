<?php
include "../includes/layout.php";
include "..\..\includes\loadcourse.php";
?>



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="..\banner\upload.css">

    <title>Course</title>

</head>
<body>     
    <style>
        @media (min-width: 990px) {
.tablemargin{
  margin-left:200px;
}

}
</style>          
<div >
                    <h2 style="  margin-top: 2%;">course Details</h2>
                    <?=$msg;?>

                    <table style="  margin-top: 2%;" class="tablemargin"  id="usertab">
                        <tr >
                            <th>course Name</th>
                            <th>id</th>
                            <th>original price</th>
                            <th>current price</th>
                            <th>discription</th>
                            <th>sort discription</th>
                            <th>icon</th>




                            <th>Edit details</th>
                            <th> Edit parts</th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_assoc($course_result)){
                        ?>
                        <tr>
                            <td><?php echo $row['cname']?></td>
                            <td><?php echo $row['cid']?></td>
                            <td><?php echo $row['coprice']?></td>
                            <td><?php echo $row['cprice']?></td>
                            <td><?php echo $row['cdisc']?></td>
                            <td><?php echo $row['disc']?></td>
                            <td><?php echo $row['cicon']?></td>


                            <td>
                            <a href="coursedetails.php?id=<?php echo $row['cid']?>"><div class="select">edit details</div></a></td>
                            <td>
                            <a href="editparts.php?id=<?php echo $row['cid']?>"><div class="select">Edit parts</div></a></td>
                        
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
         
                <h1>Upload Course</h1>
    <form style="  margin-top: 2%;" action="uploadcourse.php" method="post" enctype="multipart/form-data">
      <label for="photo">Photo:</label>
      <input type="file" name="file"><br>

      <label for="name">Name:</label>
      <input type="text" id="Name" name="Name"><br>

      <label for="Price">original Price:</label>
      <input type="text" id="Price" name="original-price"><br>
      <label for="Price">current Price:</label>
      <input type="text" id="Price" name="current-price"><br>

      
      <label for="disc">short discription</label>
      <textarea  id="disc" name="sort-disc"></textarea><br>
      <label for="disc">long discription</label>
      <textarea  id="disc" name="long-disc"></textarea><br>

      <button type="submit" name="submit"value="upload">Upload</button>
    </form>
</body>
</html>