<?php
include "../includes/layout.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Load Data in Table Based on Date Selection</title>
<style>
    .container {
    margin: 50px auto;
    width: 80%;
    text-align: center;
}

h1 {
    margin-bottom: 30px;
}

label, select {
    margin: 10px;
}

table {
    margin: 30px auto;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border: 1px solid black;
}

</style>    
<script>
    
    </script>
</head>
<body>
	<div class="container">
		<h1>Unpaid transaction data </h1>
		
		<form action="">
		<label for="start_date">Select Start Date:</label>
        <input name="start" type="date">

		<label for="end_date">Select End Date:</label>
		<input name="end" type="date">
		<button name="submit" style="padding:5px;background-color:blue;color:white;margin-left:20px;">Load Data</button>
		</form>
		<a href="markpaid.php?start=<?php echo $_GET['start']?>&end=<?php echo $_GET['end']?>"><button style="padding:5px;background-color:blue;color:white;margin-left:20px;">set as paid</button>
		</a>
		<table id="data_table">
			<thead>
				<tr>
					<th>Uid</th>
					<th>Name</th>
                    <th>mobile</th>
                    <th>email</th>
					<th>referal id</th>
                    <th>current unpaid amount</th>
                    <th>referal amount</th>




				</tr>
				<?php
				if(isset($_GET['start'])&&isset($_GET['end'])){
					$start=$_GET['start'];
					$end=$_GET['end'];
					$totalunpaid=0;
					$totalreferal=0;
					include "../includes/loadusers.php";
					include "../includes/db.php";
					while($row = mysqli_fetch_assoc($result)){
						$my_rid=$row['myrid'];
						$totalunpaid=$totalunpaid+$row['unpaidamount'];
			?>
				<tr >
					<th style=" background-color:white; color:#000;"><?php echo $row['uid'] ?></th>
					<th style=" background-color:white; color:#000;"><?php echo $row['name'] ?></th>
                    <th style=" background-color:white; color:#000;"><?php echo $row['mobile'] ?></th>
                    <th style=" background-color:white; color:#000;"><?php echo $row['email'] ?></th>
					<th style=" background-color:white; color:#000;"><?php echo $row['myrid'] ?></th>
                    <th style=" background-color:white; color:#000;"><?php echo $row['unpaidamount'] ?></th>
					<?php
					$unpaid=0;
        $unpaidpurchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`>='$start' AND `date`<='$end' AND status='unpaid'";
        $unpaidpurchase_run=mysqli_query($conn,$unpaidpurchase);
        if(mysqli_num_rows($unpaidpurchase_run)>0){
            foreach($unpaidpurchase_run as $unpaidpurchase)
            {
                $unpaid=+$unpaid+$unpaidpurchase['commission'];
              }
        }?>
                    <th style=" background-color:white; color:#000;"><?php echo $unpaid ?></th>

<?php $totalreferal=$totalreferal+$unpaid;?>


				</tr>
				<?php
				}}
				?>
			</thead>
			
			<tbody>
			</tbody>
		</table>
		<p>total unpaid amount <b><?php echo $totalunpaid ?></b> total referal amount <b><?php echo $totalunpaid ?></b></p>
		

       <a href="updateamounts.php"><button  style="padding:5px;background-color:blue;color:white;margin-left:20px;">Update Amounts on leaderboard</button>
</a> 
	</div>
	<script src="script.js"></script>
</body>
</html>
