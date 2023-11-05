<?php
            include "includes/header.php";
          

            ?>
<link href="css/sidebar_affiliate.css" rel="stylesheet" />
                    <div id="content">
                        <div class="container-fluid">
                            <div class="pcoded-content">
                                <div class="pcoded-inner-content">
                                    <div class="main-body">
                                        <div class="page-wrapper">
                                            <!-- Page-header start -->
                                            <div class="page-header">
                                                <div class="row align-items-end">
                                                    <div class="col-lg-8">
                                                        <div class="page-header-title">
                                                            <button type="button" id="sidebarCollapse"
                                                                class="btn navbar-btn">
                                                                <i class="glyphicon glyphicon-align-left"></i>
                                                                &nbsp;

                                                                <span></span>
                                                            </button>
                                                            <div class="d-inline">
                                                                <h3>Leaderboard</h3>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- Page-header end -->

                                            <!-- Page-body start -->
                                            <div class="page-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <!-- Zero config.table start -->
                                                        <div class="leaderBoard__whiteCard">
                                                            <div class="leaderBoard__header">
                                                                <h4>This Week</span></h4>
                                                            </div>
                                                            <div class="dt-responsive table-responsive leaderBoard__tabel">
                                                                <div id="">
                                                                    <div>
                                                                        <table
                                                                            class="table table-striped table-bordered nowrap"
                                                                            cellspacing="0" rules="all" border="1"
                                                                            id="simpletable"
                                                                            style="border-collapse:collapse;">
                                                                            <tr>
                                                                                <th scope="col">&nbsp;</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Amount</th>

                                                                            </tr>
                                                                            <?php
                                                                                $selectQuery = "SELECT * FROM `user` ORDER BY `7dayserning` DESC";
                                                                                include "includes/loaduserstop.php";
                                                                            while($row = mysqli_fetch_assoc($result)){
                                                                             ?>
                                                                                                                                                          <tr>
                                                                                                                                                                 <td>
                                                                                    <img class="img-radius"
                                                                                        src="image/<?php echo $row['pimage']; ?>"
                                                                                        style="width: 34px; height: 34px; border-radius: 20px;" />
                                                                                </td>
                                                                                <td>
                                                                                    <span id="lbl_ID"><?php echo $row['name']; ?></span>
                                                                                    
                                                                                </td>
                                                                                <td style="width:30%;">
                                                                                    ₹<span id="lbl_Name"><?php echo $row['7dayserning'];?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                                }
                                                                                ?>
                                                                                                                                                                                                                
                                                                                                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <!-- Zero config.table start -->
                                                        <div class="leaderBoard__whiteCard">
                                                            <div class="leaderBoard__header">
                                                                <h4>This Month</span></h4>
                                                            </div>
                                                            <div class="dt-responsive table-responsive leaderBoard__tabel">
                                                                <div id="">
                                                                    <div>
                                                                        <table
                                                                            class="table table-striped table-bordered nowrap"
                                                                            cellspacing="0" rules="all" border="1"
                                                                            id="sampleTableMonth"
                                                                            style="border-collapse:collapse;">
                                                                            <tr>
                                                                                <th scope="col">&nbsp;</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Amount</th>
                                                                            </tr>
                                                                            <?php
                                                                                $selectQuery = "SELECT * FROM `user` ORDER BY `onemonthearning` DESC";
                                                                                include "includes/loaduserstop.php";
                                                                            while($row = mysqli_fetch_assoc($result)){
                                                                             ?>
                                                                                                                                                          <tr>
                                                                                                                                                                 <td>
                                                                                    <img class="img-radius"
                                                                                        src="image/<?php echo $row['pimage']; ?>"
                                                                                        style="width: 34px; height: 34px; border-radius: 20px;" />
                                                                                </td>
                                                                                <td>
                                                                                    <span id="lbl_ID"><?php echo $row['name']; ?></span>
                                                                                    
                                                                                </td>
                                                                                <td style="width:30%;">
                                                                                    ₹<span id="lbl_Name"><?php echo $row['onemonthearning'];?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                                }
                                                                                ?>
                                                                                                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <!-- Zero config.table start -->
                                                        <div class="leaderBoard__whiteCard">
                                                            <div class="leaderBoard__header">
                                                                <h4>Yearly</h4>
                                                            </div>
                                                            <div class="dt-responsive table-responsive leaderBoard__tabel">

                                                                <div id="" style="max-height: 700px; overflow-y: scroll;">

                                                                    <div>
                                                                        <table
                                                                            class="table table-striped table-bordered nowrap"
                                                                            cellspacing="0" rules="all" border="1"
                                                                            id="sampleTableFY"
                                                                            style="border-collapse:collapse;">
                                                                            <tr>
                                                                                <th scope="col">&nbsp;</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Amount</th>
                                                                            </tr>
                                                                            <?php
                                                                                $selectQuery = "SELECT * FROM `user` ORDER BY `oneyearearning` DESC";
                                                                                include "includes/loaduserstop.php";
                                                                            while($row = mysqli_fetch_assoc($result)){
                                                                             ?>
                                                                                                                                                          <tr>
                                                                                                                                                                 <td>
                                                                                    <img class="img-radius"
                                                                                        src="image/<?php echo $row['pimage']; ?>"
                                                                                        style="width: 34px; height: 34px; border-radius: 20px;" />
                                                                                </td>
                                                                                <td>
                                                                                    <span id="lbl_ID"><?php echo $row['name']; ?></span>
                                                                                    
                                                                                </td>
                                                                                <td style="width:30%;">
                                                                                    ₹<span id="lbl_Name"><?php echo $row['oneyearearning'];?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                                }
                                                                                ?>
                                                                                                                                                      
                                                                                                                                                    </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <!-- Zero config.table start -->
                                                        <div class="leaderBoard__whiteCard">
                                                            <div class="leaderBoard__header">
                                                                <h4 class="sub-title">All Time</h4>
                                                            </div>
                                                            <div class="dt-responsive table-responsive leaderBoard__tabel">
                                                                <div id="" style="max-height: 700px; overflow-y: scroll;">
                                                                    <div>
                                                                        <table
                                                                            class="table table-striped table-bordered nowrap"
                                                                            cellspacing="0" rules="all" border="1"
                                                                            id="sampleTableYear"
                                                                            style="border-collapse:collapse;">
                                                                            <tr>
                                                                                <th scope="col">&nbsp;</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Amount</th>
                                                                            </tr>
                                                                            <?php
                                                                                $selectQuery = "SELECT * FROM `user` ORDER BY `alltimeearning` DESC";
                                                                                include "includes/loaduserstop.php";
                                                                            while($row = mysqli_fetch_assoc($result)){
                                                                             ?>
                                                                                                                                                          <tr>
                                                                                                                                                                 <td>
                                                                                    <img class="img-radius"
                                                                                        src="image/<?php echo $row['pimage']; ?>"
                                                                                        style="width: 34px; height: 34px; border-radius: 20px;" />
                                                                                </td>
                                                                                <td>
                                                                                    <span id="lbl_ID"><?php echo $row['name']; ?></span>
                                                                                    
                                                                                </td>
                                                                                <td style="width:30%;">
                                                                                    ₹<span id="lbl_Name"><?php echo $row['alltimeearning'];?></span>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                                }
                                                                                ?>
                                                                                                                                                    </table>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Page-body end -->
                                        </div>
                                    </div>
                                    <!-- Main-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
            <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
            <script>
                $("#sidebarCollapse").on("click", function () {
                    $("#sidebar").toggleClass("active");
                    $(this).toggleClass("active");
                });

                $(".nav__close").click(function () {

                    $("#sidebarCollapse").click();
                });
            </script>
          
            <?php
            include "includes/footer.php"
            ?>