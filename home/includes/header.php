<?php 
session_start();
include "../includes/db.php";

if (isset($_SESSION['uid'])) {

    $email=$_SESSION['email'];
$uid=$_SESSION['uid'];
$sql = "SELECT * FROM user WHERE email='$email' AND uid='$uid'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

            if($row['ispurchased']==1){
                ?>
<html class="">

    <style>
        main {
            margin-top: 7rem;
        }
    </style>


<head>
    <meta charset="utf-8" />
    <link href="./asset/logo.png" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <title>
      Affilpro
    </title>
    <link rel="stylesheet" href="/affilpro/home/css/style.css?v=1.1" />
    <link rel="stylesheet" href="/affilpro/home/css/zuck.min.css?v=1.13" />
    <link rel="stylesheet" href="/affilpro/home/css/snapgram.css" />
    <link rel="stylesheet" href="/affilpro/home/css/vemedezap.css" />
    <link rel="stylesheet" href="/affilpro/home/css/facesnap.css" />
    <link rel="stylesheet" href="/affilpro/home/css/snapssenger.css" />
    <script src="/affilpro/home/css/zuck.min.js"></script>
    <script src="/affilpro/home/css/script.js"></script>
    <link rel="stylesheet" href="/affilpro/home/css/bootstrap.min.css" />    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/affilpro/home/css/header.css?v=3.7" />
    <link rel="stylesheet" href="/affilpro/home/css/footer.css?v=1.3" />
    <link rel="stylesheet" href="/affilpro/home/css/carousel.css" />
    <link rel="stylesheet" href="/affilpro/home/css/carouseller.css" />
    <link rel="stylesheet" href="/affilpro/home/css/animate.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?&amp;family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        main {
            margin-top: 7rem;
        }
    </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <!-- feather Awesome -->
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/feather.css">
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/icofont.css">
        <!-- Style.css -->
            <link rel="stylesheet" type="text/css" href="/affilpro/home/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/style1.css">
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/jquery.mCustomScrollbar.css">
        <!-- Data Table Css -->
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/responsive.bootstrap4.min.css">
        <!-- Date-time picker css -->
        <!-- Date-time picker css -->
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/bootstrap-datetimepicker.css">
        <!-- Date-time picker css -->
        <link rel="stylesheet" type="text/css" href="/affilpro/home/css/bootstrap-datetimepicker.css">
        <link href="/affilpro/home/css/membermasternew.css" rel="stylesheet">
        <link href="/affilpro/home/css/memberpanel.css?v=1.0" rel="stylesheet">
        <script src="/Scripts/jquery-3.4.1.js" type="text/javascript"></script>
</head>
<header>
    <nav class="navbar-default header__nav" id="">
        <div class="container-90">
            <div class="row">
                <div class="col-md-12">
                    <div class="header__logo">
                        <a class="navbar-brand" href="../">
                            <img src="/affilpro/assets/image/logo.png" alt="logo" class="logo-img1" style="height: 37px;  margin-top:6px;">
                        </a>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" id="toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav nav__menu">
                            <li><a href="/affilpro">Home</a></li>
                            <li class="biz_bundle_nav" style="display: none;">
                                <div class="header__dropdown">
                                    <button class="dropdown_nav_show1" type="button">
                                       User Details
                                        <span class="caret"></span>
                                    </button>
                                </div>
                            </li>
                            <li class="biz_bundle_nav">
                                <div class="header__dropdown">
                                    <button class="dropdown-toggle dropdown_nav_show2" type="button">
                                      <a href="/affilpro/about-us">  About Us</a>
                                    </button>
                                </div>
                            </li>
                           <li><a href="/affilpro/contact" id="">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="desktop__cart">
                <div id="div_userprofile" class="dropdown user__dropdown">
                            <button class="btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                <img id="img_profile" src="/affilpro/home/image/<?php echo $row['pimage']; ?>">                            </button>
                            <ul id="profile_option" class="dropdown-menu">
                <li id="li_myprofile">
                    <a href="/affilpro/home/profile">
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                        My Profile</a>
                                </li>
                                <li><a href="/affilpro/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                                        Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


<script>
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
                $(this).toggleClass("active");
            });

            $(".nav__close").click(function() {

                $("#sidebarCollapse").click();
            });
        </script>
<body class="">

    <div>
        <style>
            main {
                zoom: 100% !important;
            }

            #content {
                zoom: 80%;
            }

            .learner_cmt {
                width: 100%;
                font-size: 14px;
                font-weight: 600;
            }

            .learner_cmt img {
                max-width: 25px;
            }
        </style>

        <main>
            <div class="wrapper">
                <!-- Sidebar Holder -->
                <nav id="sidebar" class="">
                    <style>
    .sidebar_anil {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #fff;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
        font-size: 16px;
        color: #fff;
        padding: 0px 0px 0px 5px;
        display: flex;
        align-items: center;
        margin: 0 16px 10px 0;
        cursor: pointer;
        font-weight: 600;
        border-left: 3px solid transparent;
        position: relative;
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }
    .sidebar_anil:hover{
        
    }
    .try-my-course{
        margin-left:90px;
    }
     .try-my-course1{
        margin-left:82px;
    }
 .try-my-course2
 {
margin-left:61px;
    }
.submenu_anil {
        display: none;
        font-size: 25px;
        align-items: center;
        width: 100%;
        color: black;
        font-family: "Poppins", sans-serif !important;
        justify-content: space-between;
        font-weight: 600;
        line-height:33px;
        margin-left: 29px;    }
</style>
<button class="sidebar_anil">Affiliate Panel
    <i class="fa fa-caret-down try-my-course2"></i>
</button>
<div class="submenu_anil">
    <a href="/affilpro/home">Dashboard</a><br>
    <a href="/AFFILPRO/HOME/commission.php">Affiliate/Commission</a><br>
    <a href="/affilpro/home/leaderboard.php">Leaderboard</a><br>
    <a href="#">Offer</a><br>
    <a href="#">Training/Webinar</a><br>

</div>
<hr>
<button class="sidebar_anil" style="margin-left: -8px;"><a class="sidebar_anil" href="/affilpro/home/courses">Available Courses</a></button>
<hr>
<button class="sidebar_anil" style="margin-left: -8px;"><a class="sidebar_anil" href="/affilpro/home/Upgrade-Benefits">Upgrade Benefits</a></button>
<hr>
<button class="sidebar_anil" style="margin-left: -8px;"><a class="sidebar_anil" href="/affilpro/home/courses/mycourses.php">My Courses</a></button>
<hr>
<button class="sidebar_anil" style="margin-left: -5px;"><a class="sidebar_anil" href="/affilpro/home/profile">My Profile</a>
</button></button>
<hr>
<button class="sidebar_anil" style="margin-left: -5px;"><a class="sidebar_anil" href="/affilpro/home/kyc">Kyc</a>
</button>

<hr>
<button class="sidebar_anil" style="margin-left: -5px;"><a class="sidebar_anil" href="#">Support</a>
</button>
<hr>
<!--<button class="sidebar_anil">Upgrade_offer-->
<!--    <i class="fa fa-caret-down try-my-course1"></i>-->
<!--</button>-->
<!--<div class="submenu_anil">-->
<!--    <a href="course_upgrade.php">Offer to Upgrade</a><br>-->
<!--</div>-->


<!--<a href="logout.php"><button class="sidebar_anil">-->
<!--Logout-->
<!--</button></a>-->
<script>
    var dropdown = document.getElementsByClassName("sidebar_anil");
    var i;
    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>


                </nav>

                <style>
                    .cls_cat,
                    .certificate,
                    .myprofile {
                        display: none;
                    }

                    .my_courses {
                        display: block !important;
                    }
                </style>
                <link href="/affilpro/home/css/my_course.css?v=2.5" rel="stylesheet">
                <link href="/affilpro/home/css/sidebar_mycourse.css" rel="stylesheet">
                <!--<link href="https://fonts.googleapis.com/css2?family=Carter+One&amp;display=swap" rel="stylesheet">-->

                <?php
     
    }elseif($row['ispurchased']==0){
        
        echo' <script>alert("You Need To To Buy Something First")
        location.href = "/affilpro/home/purchase"
        </script>';
        exit();            }

    }else{

        echo' <script>alert("something went wrong")
        location.href = "/affilpro/login"
        </script>';
        exit();

    }

?>

                <?php
}else{

    
   
        header("Location:/affilpro");

exit();

}
?>