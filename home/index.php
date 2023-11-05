<?php
            include "includes/header.php"
            ?>
<style>
                        .wt-overlay {
                            opacity: 0.7;
                        }

                        .wt-title {
                            font-size: 16px;
                        }

                        .wt-content {
                            font-size: 12px;
                        }

                        .wt-btns {
                            font-size: 13px;
                            padding: 8px 0px;
                            min-width: 60px;
                        }

                        button.wt-btns.wt-btn-next {
                            background: rgb(0 173 255) !important;
                        }

                        .wt-popover {
                            border: 3px solid #ff783d;
                            border-radius: 6px !important;
                        }

                        body {
                            overflow-y: clip;
                        }

                        @media(max-width:768px) {

                            .wt-overlay,
                            .wt-popover {
                                display: none;
                            }
                        }
                    </style>

                   

                    <link href="css/dashboard.css" rel="stylesheet" />
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
                                                                <h4 class='color:Brown'>Dashboard</h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                                                                         <h1 class="welcome__usre"><span>Welcome <?php echo $row['name'] ?></h1>
                                                                                      
                                            <div class="page-body">
                                                <div class="row row-new">
                                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                                          <div class="white_card card_height_100 mb_30">
                                                            <div class="white_card_header">
                                                                <div class="row align-items-center">
                                                                    <div class="col-lg-8 col-sm-8 col-xs-8">
                                                                        <div class="main-title">
                                                                            <h3 class="m-0">Your Recent Sales</h3>
                                                                        </div>
                                                                    </div>
                                            
                                                                </div>

                                                            </div>
                                                            <div class="white_card_body" style="max-height: 315px; overflow-y: scroll;">
                                                                
                                                            <?php
        if(isset($row['uid']))
        {
            $earning=0;
            $my_rid=$row['myrid'];
            $purchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' ORDER BY datetime DESC ";
            $purchase_run=mysqli_query($conn,$purchase);
            if(mysqli_num_rows($purchase_run)>0){
                foreach($purchase_run as $purchase)
                {
                    $earning=$earning+$purchase['commission'];
                    $myrid=$purchase['p_rid'];
            $user = "SELECT * FROM `user` WHERE `myrid`='$myrid' ";
            $user_run=mysqli_query($conn,$user);
            if(mysqli_num_rows($user_run)>0){
                foreach($user_run as $user)
                {
                    ?>
                
                                                                   <div class="single_user_pil d-flex align-items-center justify-content-between">
                                                                    <div class="user_pils_thumb d-flex align-items-center">
                                                                        <div class="thumb_34 mr_15 mt-0">
                                                                            <img class="img-fluid radius_50"
                                                                                src="image/<?php echo $user['pimage']; ?>" alt="">
                                                                        </div>
                                                                        <span class="f_s_14 f_w_400 text_color_11"><?php echo $user['name']; ?></span>
                                                                    </div>
                                                                    <div class="user_info">
                                                                        ₹<?php echo $purchase['price']; ?><br />
                                                                        <span class="timing"><?php echo $purchase['date']; ?> <?php echo $purchase['time']; ?></span>
                                                                    </div>
                                                                </div>
                                                                                                                                
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
           
                                                                                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="white_card user_crm_wrapper user_amt_list">
                                                            <div class="card__UsreDeatil">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                                                        <div class="detail__main">
                                                                               <div class="usre__img">
                                                                                <img src="Array"/>
                                                                                <img id="img_profile" src="image/<?php echo $row['pimage']; ?> ">
                                                                            </div>
                                                                             
                                                                                <div class="user__nameDate">
                                                                                <p><?php echo $row['name']; ?><span><?php echo $row['email']; ?> </span><span>Affiliate Id : <?php echo $row['myrid']; ?> </span>
                                                                                </p>
                                                                            </div>
                                                                            

                                                                         
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <?php

              
              if(isset($row['uid']))
        {
           $todayamt=0;
            $my_rid=$row['myrid'];
            $purchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`=CURDATE()";
            $purchase_run=mysqli_query($conn,$purchase);
            if(mysqli_num_rows($purchase_run)>0){
                foreach($purchase_run as $purchase)
                {
                    $todayamt=+$todayamt+$purchase['commission'];
                  }
            }
        }
             ?>

                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                                    <div class="single_crm">
                                                                        <div class="crm_head d-flex align-items-center justify-content-between test">
                                                                        <h6 style="color:#fff;">Today's Earning</h6>

                                                                        
                                                                            
                                                                        </div>
                                                                        
                                                                                                                                                <div class="crm_body">
                                                                            <h4><span
                                                                                    id="MainContenttxtTodayEarning">₹ <?php echo $todayamt ?></span>
                                                                                <span>
                                                                                    </span>
                                                                            </h4>
                                                                        </div>
                                                                                                                                            </div>
                                                                </div>
<?php
                                                                
              if(isset($row['uid']))
        {
           $sevendaysamt=0;
            $my_rid=$row['myrid'];
            $purchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`>=DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
            $purchase_run=mysqli_query($conn,$purchase);
            if(mysqli_num_rows($purchase_run)>0){
                foreach($purchase_run as $purchase)
                {
                    $sevendaysamt=+$sevendaysamt+$purchase['commission'];
                  }
            }
        }
             ?>
                                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                                    <div class="single_crm single_crm_1">
                                                                        <div
                                                                            class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                                                            <h6 style="color:#fff;">Last 7 Days Earning</h6>

                                                                            
                                                                            
                                                                        </div>
                                                                        
                                                                                                                                                
                                                                        <div class="crm_body">
                                                                            <h4><span id="txtTodayEarning">₹</span>
                                                                                <span>
                                                                                <?php echo $sevendaysamt ?></span>
                                                                            </h4>
                                                                        </div>
                                                                                                                                                
                                                                    </div>
                                                                </div>

                                                                <?php
                                                                
              if(isset($row['uid']))
        {
           $monthearning=0;
            $my_rid=$row['myrid'];
            $purchase = "SELECT * FROM `purchase` WHERE `sponser_rid`='$my_rid' AND `date`>=DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
            $purchase_run=mysqli_query($conn,$purchase);
            if(mysqli_num_rows($purchase_run)>0){
                foreach($purchase_run as $purchase)
                {
                    $monthearning=+$monthearning+$purchase['commission'];
                  }
            }
        }
             ?>
                                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                                    <div class="single_crm single_crm_2 last_crm">
                                                                        <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                                                        <h6 style="color:#fff;">Last 30 Days Earning</h6>

                                                                      
                                                                              </div>
                                                                        
                                                                                                                                                <div class="crm_body">
                                                                            <h4><span id="txtEarning">₹</span>
                                                                                <span>
                                                                                <?php echo $monthearning?></span>
                                                                            </h4>
                                                                        </div>
                                                                                                                                                
                                                                    </div>
                                                                </div>
                                                                <a href="commission.php">
                                                                <div class="col-lg-6 col-sm-6 col-xs-12">
                                                                    <div class="single_crm single_crm_3 last_crm">
                                                                        <div
                                                                            class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                                                            <h6 style="color:#fff;">All Time Earning</h6>
                                                                            
                                                                         

                                                                        </div>
                                                                        
                                                                        
                                                                        <div class="crm_body">
                                                                            <h4><span id="txtng">₹</span>
                                                                                                                                                             <span>
                                                                                  <?php echo $earning?></span>
                                                                                                                                                            </h4>
                                                                            <p></p>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <!-- Modal -->
                                <div class="modal fade zoom_none" id="myModal2" role="dialog">
                                    <div class="modal-dialog" style="max-width: 590px;">

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