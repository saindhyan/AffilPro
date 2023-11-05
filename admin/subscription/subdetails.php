<?php
include "../includes/layout.php";
include "loadsubs.php";
include "../includes/db.php"
?>

<link rel="stylesheet" type="text/css" href="..\banner\upload.css">

<?php
        if(isset($_GET['id']))
        {
            $sid=$_GET['id'];
            $sub = "SELECT * FROM `subpacks` WHERE `sid`='$sid' ";
            $sub_run=mysqli_query($conn,$sub);
            if(mysqli_num_rows($sub_run)>0){
                foreach($sub_run as $sub)
                {
                    ?>

<h1>Edit Subscription</h1>
    <form action="updatesub.php" method="post" enctype="multipart/form-data">
      <label for="photo">Photo:</label>
      <input type="file" name="file"><br>
      <label for="id">id:</label>
      <input type="text" name="sid" value="<?php echo $sub['sid']; ?>"><br>

      <label for="name">Name:</label>
      <input type="text" id="Name" name="Name" value="<?php echo $sub['sname']; ?>"><br>

      <label for="Price">Price:</label>
      <input type="text" id="Price" name="price"value="<?php echo $sub['sprice']; ?>"><br>

      <label for="Benefits">Benefits:</label>
      <input type="text" id="Benefits" name="Benefits"value="<?php echo $sub['sbanefits']; ?>"><br>

      <label for="Course">Course included(id seprated with comas):</label>
      <input type="text" id="Course" name="Course"value="<?php echo $sub['cin']; ?>"><br>
      <label for="disc">Course discription</label>
      <textarea  id="disc" name="disc"><?php echo $sub['sdisc']; ?></textarea><br>

      <button type="submit" name="submit"value="upload">Submit</button>
    </form>

    <a href="deletesub.php?id=<?php echo $sub['sid']; ?>"><button >delete</button></a>

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