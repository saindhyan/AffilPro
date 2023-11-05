<?php
            include "includes/HEADER.php"
            ?>
<link href="css/sidebar_myprofile.css" rel="stylesheet" />
                <div id="content">
                        <div class="container-fluid">
                            <div class="pcoded-content">
                                <div class="pcoded-inner-content">
                                    <!-- Main-body start -->
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
                                                                <h4>Your Commission</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Page-header end -->
                                            <div class="page-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-block">
                                                                <div class="my__cerificatetable">
                                                                    <div>
                                                                        <table
                                                                            class="table table-striped table-bordered nowrap"
                                                                            cellspacing="0" rules="all" border="1"
                                                                            id="ContentPlaceHolder1_NestedContentPlaceHolder_gv_display"
                                                                            style="border-collapse:collapse;">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">S.No</th>
                                                                                    <th scope="col">Level</th>
                                                                                    <th scope="col">Name</th>
                                                                                    <th scope="col">Date Of Purchase</th>
                                                                                    <th scope="col">Purchase </th>
                                                                                    <th scope="col">Commission</th>
                                                                                    <th scope="col">Amount TransferDate</th>
                                                                                    <th scope="col"></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>

                                                                            <?php
        if(isset($row['uid']))
        {
            $id=0;
            $my_rid=$row['myrid'];
            $purchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid'ORDER BY datetime DESC ";
            $purchase_run=mysqli_query($conn,$purchase);
            if(mysqli_num_rows($purchase_run)>0){
                foreach($purchase_run as $purchase)
                {
                    $id=$id+1;
                    $myrid=$purchase['p_rid'];
            $user = "SELECT * FROM `user` WHERE `myrid`='$myrid' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)>0){
                foreach($user_run as $user)
                {
                    ?>
                                                                           <tr>
                                                                                    <td><?php echo $id ?></td>
                                                                                    <td>Direct</td>
                                                                                    <td><?php echo $user['name']; ?> </td>
                                                                                    <td><?php echo $purchase['date']; ?> <?php echo $purchase['time']; ?></td>
                                                                                    <td><?php echo $purchase['purchasename']; ?></td>
                                                                                    <td><?php echo $purchase['commission']; ?></td>
                                                                                    <td><?php echo $purchase['status']; ?></td>
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
                            }else
                            {
                                ?>
                                <p>not found</p>
                                <?php

                            }

                                }
                            ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script>
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });

            $(".nav__close").click(function() {

                $("#sidebarCollapse").click();
            });
        </script>

            <?php
            include "includes/footer.php"
            ?>