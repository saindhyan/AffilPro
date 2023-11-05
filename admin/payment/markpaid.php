<?php
include "../includes/db.php";
include "../includes/loadusers.php";
if(isset($_GET['start'])&&isset($_GET['end'])){
    $start=$_GET['start'];
    $end=$_GET['end'];
    while($row = mysqli_fetch_assoc($result)){
        $my_rid=$row['myrid'];
        $ammount=0;
        $unpaidpurchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`>='$start' AND `date`<='$end' AND status='unpaid'";
        $unpaidpurchase_run=mysqli_query($conn,$unpaidpurchase);
        if(mysqli_num_rows($unpaidpurchase_run)>0){
            foreach($unpaidpurchase_run as $unpaidpurchase)
            {
                $ammount=+$ammount+$unpaidpurchase['commission'];
              }
        }
        $updatedamount=$row['unpaidamount']-$ammount;
        $insert2 = $conn->query("UPDATE purchase set status=now() WHERE `date`>='$start' AND `date`<='$end' AND sponser_rid='$my_rid'");

        $insert = $conn->query("UPDATE user set unpaidamount='$updatedamount' WHERE myrid='$my_rid'");

       

    }
    ?>
    <script>
        alert("Updated Succussfully");
        location.href = "index.php"
        </script>
    <?php
    exit();
}else{
    ?>
    <script>
        alert("set dates first");
        location.href = "index.php"
        </script>
    <?php
    exit();
}
?>