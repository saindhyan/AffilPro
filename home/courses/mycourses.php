<?php
include "../includes/header.php";
?>
<?php
$mycourse=$row['coursesenroled'];
?>
<style>@media(min-width:576px) {
	.img-thumbnail{
		width:40vw;
		height:20vw;
	}

}</style>
          
<div class="pcoded-content">
                            <div class="pcoded-inner-content">
                            <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page-header start -->
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
                                        <!-- Page-header end -->

                                        <!-- Page-body start -->
                                        <div class="page-body">
                                            <div class="row">

                                                <!-- video grid -->
                                                <div class="col-sm-12">
                                                    <!-- Video Grid card start -->
                                                    <div id="ContentPlaceHolder1_NestedContentPlaceHolder_dv_bundle" class="card">
                                                        <div class="headers">
                                                            <h3>My Enrolled Courses</h3>
                                                            <div class="explore__moreBTN" style="display: none">

                                                                <!-- <a id="ContentPlaceHolder1_NestedContentPlaceHolder_lnk_exploremore" class="btn btn-danger" href="javascript:__doPostBack('ctl00$ctl00$ContentPlaceHolder1$NestedContentPlaceHolder$lnk_exploremore','')">See More Courses &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->

                                                            </div>
                                                        </div>
                                                        <div class="card-block">
                                                            <div id="ContentPlaceHolder1_NestedContentPlaceHolder_documentGrid" class="row">
         <?php        
         include "..\..\includes\loadcourse.php";
         while($row = mysqli_fetch_assoc($course_result)){
                                            $string = $mycourse;
                                            $str_arr = explode (",", $string); 
                                            $len = sizeof($str_arr);
                                    for($i = 0; $i < $len; ++$i) {
                                    ?>
                                            <?php
                                            $cid=$str_arr[$i];
                                            if($cid==$row['cid']){
                                                ?>                                                     
                                                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                                                     <div class="thumbnail"> 
                                                                        <div class="thumb">
                                                                            <img src="..\../assets/image/uploads/<?php echo $row['cicon']?>" alt="" class="img-fluid img-thumbnail step1">
                                                                        </div>
                                                                        <div class="thumbnail__name">
                                                                            <label class="plan_name"><?php echo $row['cname']?></label>
                                                                        </div>
                                                                        </a>
                  
            <div class="thumbnail__name text-center">
            <a class="btn btn-warning w-100 shadow-none" style="background-color:#0284b4; border-color:#0284b4 ;" href = "course_player.php?id=<?php echo $row['cid']?>&part=1"> Start</a>                        </div>
            
        </div>                                                       </div>
                                                                
                                                                                 
                      
        <?php }
        }
        }
    ?>        
       <div class="col-lg-3 col-sm-6 col-xs-12">
                                                                     <div class="thumbnail" style="visibility:hidden;"> 
                                                                        <div class="thumb">
                                                                            <img style="width:40vw;height:20vw; visibility:hidden;">
                                                                        </div>
                                                                        <div class="thumbnail__name">
                                                                        </div>
                                                                        </a>
                  
            <div class="thumbnail__name text-center">
        </div>
    </div>

       </div>
                                                                                                                            <!--<div class="upgrade__planBTN" style="display: none;">-->
                                                            <!--    <input type="submit" name="" value="Upgrade My Plan" id="ContentPlaceHolder1_NestedContentPlaceHolder_btn_upgrade_bundel" class="btn">-->

                                                            <!--</div>-->
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Video Grid card end -->

                                <!-- Page-body end -->
                            </div>
                        </div>
                    </div>

                <!-- Main-body end -->

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
        
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog" style="display: none;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" id="icon_close">×</button>
                        <h4 class="modal-title english_hindi_btn">Dashboard Guide <button type="button" id="btn_lang">Watch in English</button> </h4>
                    </div>
                    <div class="modal-body">
                        <iframe id="vdo_frame" width="560" height="300" style="width: 100%;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" data-ready="true"></iframe>
                    </div>
                    <div class="modal-footer guid__videoFooter">
                        <div class="guid__videoFooter__check">
                            <input type="checkbox" id="chk_stop_vdo_pop">
                            <span>Thank you! I have already seen it.</span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="ctl00$ctl00$ContentPlaceHolder1$NestedContentPlaceHolder$hdn_checkFPSval" id="hdn_checkFPSval" value="1">
            </div>
        </div>

       
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<?php
include "../includes/footer.php";
?>