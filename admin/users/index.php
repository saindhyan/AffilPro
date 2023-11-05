<?php
include "loadusers.php";
include "../includes/layout.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>user details</title>


</head>
<body>
                <div >
                    <h2>User Details</h2>
                    <p>Registered User Details</p>
                    <?=$msg;?>

                    <table id="usertab">
                        <tr>
                            <th>User's Name</th>
                            <th>User's Email</th>
                            <th></th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']; ?></td>
                           

                            <td>
                            <a href="userdetails.php?id=<?php echo $row['uid']?>"><div class="select">Select</div></a></td>
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
                    </body>
</html>