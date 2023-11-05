<?php
include "loadRequest.php";
include "../includes/layout.php";
include "../includes/db.php";

?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>Requests To Aproove</title>

</head>
<body>     
                

                <div >
                    <h2>Requests To Aproove</h2>
                    <p>bank details</p>
                    <?=$msg;?>

                    <table id="usertab">
                        <tr>
                            <th>User's Name</th>
                            <th>User's Email</th>
                            <th>User's Mobile</th>
                            <th>Uid</th>
                            <th>Bank Name</th>
                            <th>account Name</th>
                            <th>account number</th>
                            <th>ifsc code</th>
                            <th>branch</th>
                            <th>Passbook</th>

                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                         <?php
        if(isset($row['uid']))
        {

            $u_id=$row['uid'];
            $user = "SELECT * FROM `user` WHERE `uid`='$u_id' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)>0){
                foreach($user_run as $user)
                {
                    ?>
                   
                        <tr>
                        <td><?php echo $user['name']?></td>
                        <td><?php echo $user['email']?></td>
                        <td><?php echo $user['mobile']?></td>
                    <?php
                }
            }else
            {
                ?>
<tr>
                        <td><?php echo "Not found"?></td>
                        <td><?php echo "Not found"?></td>
                        <td><?php echo "Not found"?></td>
              <?php

            }

        }
    ?>
                        <td><a href="../users/userdetails.php?id=<?php echo $row['uid']?>"><?php echo $row['uid']?></a></td>

                            <td><?php echo $row['bank_name']?></td>
                            <td><?php echo $row['account_name']; ?></td>
                            <td><?php echo $row['account_number']?></td>
                            <td><?php echo $row['ifsc_code']?></td>
                            <td><?php echo $row['branch']?></td>

                            <td>
                            <a href="/affilpro/home/image/kyc/<?php echo $row['passbook']?>" target="_blank"><div class="select">View</div></a></td>
                       
                        

                            <td>
                            <a href="approve.php?id=<?php echo $row['uid']?>"><div class="select">Aprove</div></a></td>
                       
                        
                        <td>
                            <a href="reject.php?id=<?php echo $row['uid']?>"><div class="select">Reject</div></a></td>
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
</body>
</html>