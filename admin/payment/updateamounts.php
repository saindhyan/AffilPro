<?php
include "../users/loadusers.php";
include "../includes/db.php";
?>
<?php
 while($row = mysqli_fetch_assoc($result)){
    $sevendaysamt=0;                 
    $my_rid=$row['myrid'];
            $sdpurchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`<=DATE_SUB(CURDATE(), INTERVAL 1 DAY)  AND `date`>=DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
            $sdpurchase_run=mysqli_query($conn,$sdpurchase);
            if(mysqli_num_rows($sdpurchase_run)>0){
                foreach($sdpurchase_run as $sdpurchase)
                {
                    $sevendaysamt=+$sevendaysamt+$sdpurchase['commission'];
                  }
            }
        
        
        $monthearning=0;
        $mpurchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`>=DATE_SUB(CURDATE(), INTERVAL 30 DAY )AND `date`<=DATE_SUB(CURDATE(), INTERVAL 1 DAY) ";
        $mpurchase_run=mysqli_query($conn,$mpurchase);
        if(mysqli_num_rows($mpurchase_run)>0){
            foreach($mpurchase_run as $mpurchase)
            {
                $monthearning=+$monthearning+$mpurchase['commission'];
              }
        }
        $thisyear=0;
        $ypurchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`>=DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND `date`<=DATE_SUB(CURDATE(), INTERVAL 1 DAY) ";
        $ypurchase_run=mysqli_query($conn,$ypurchase);
        if(mysqli_num_rows($ypurchase_run)>0){
            foreach($ypurchase_run as $ypurchase)
            {
                $thisyear=+$thisyear+$ypurchase['commission'];
              }
        }
        $alltime=0;
        $allpurchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid'  AND `date`<=DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
        $allpurchase_run=mysqli_query($conn,$allpurchase);
        if(mysqli_num_rows($allpurchase_run)>0){
            foreach($allpurchase_run as $allpurchase)
            {
                $alltime=+$alltime+$allpurchase['commission'];
              }
        }
        $unpaid=0;
        $unpaidpurchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid'  AND `date`<=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND status='unpaid'";
        $unpaidpurchase_run=mysqli_query($conn,$unpaidpurchase);
        if(mysqli_num_rows($unpaidpurchase_run)>0){
            foreach($unpaidpurchase_run as $unpaidpurchase)
            {
                $unpaid=+$unpaid+$unpaidpurchase['commission'];
              }
        }
        $insert = $conn->query("UPDATE user set 7dayserning='$sevendaysamt',onemonthearning='$monthearning',oneyearearning='$thisyear',unpaidamount=$unpaid,alltimeearning='$alltime' WHERE myrid='$my_rid'");
    }
  
           echo' <script>alert(" successfully updated")
               location.href = "index.php"
               </script>';
               exit();

             ?>