<?php
include "../includes/layout.php";
include "loadsubs.php";

?>

<title>subs Details</title>
                
<link rel="stylesheet" type="text/css" href="..\banner\upload.css">

                <div >
                    <h2>subscription Details</h2>
                    <?=$msg;?>

                    <table id="usertab">
                        <tr>
                            <th>Name</th>
                            <th>id</th>
                            <th>price</th>
                            <th>benefits</th>
                            <th>icon link</th>
                            <th>course included</th>




                            <th></th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['sname']?></td>
                            <td><?php echo $row['sid']; ?></td>
                            <td><?php echo $row['sprice']; ?></td>
                            <td><?php echo $row['sbanefits']; ?></td>
                            <td><?php echo $row['sicon']; ?></td>
                            <td><?php echo $row['cin']; ?></td>




                           

                            <td>
                            <a href="subdetails.php?id=<?php echo $row['sid']?>"><div class="submit">Edit</div></a></td>
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>

                <h1>Upload Subscription</h1>
    <form action="uploadsub.php" method="post" enctype="multipart/form-data">
      <label for="photo">Photo:</label>
      <input type="file" name="file"><br>

      <label for="name">Name:</label>
      <input type="text" id="Name" name="Name"><br>

      <label for="Price">Price:</label>
      <input type="text" id="Price" name="price"><br>

      <label for="Benefits">Benefits:</label>
      <input type="text" id="Benefits" name="Benefits"></input><br>

      <label for="Course">Course included(id seprated with comas):</label>
      <input type="text" id="Course" name="Course"></input><br>
      <label for="disc">Course discription</label>
      <textarea  id="disc" name="disc"></textarea><br>

      <button type="submit" name="submit"value="upload">Upload</button>
    </form>