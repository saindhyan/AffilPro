<?php 

session_start();

if (isset($_SESSION['user'])) {
    ?>
    <!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    </head>
<body>
<style>
    .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
.navsync{
    visibility: hidden;
}
@media (min-width: 990px) {

.navhide{
    display: none;
    visibility: hidden;
}
.navsync{
    visibility: visible;
}
}

    </style>
<script>
           function closenav() {
               document.getElementById('sidebar').style.visibility="hidden";
               document.getElementById('opennav').style.visibility="visible";
            };
            
            function opennav() {
               document.getElementById('sidebar').style.visibility="visible";
               document.getElementById('opennav').style.visibility="hidden";

            };
            
        </script>
<script src="https://kit.fontawesome.com/b99e675b6e.js">

</script>
                <link rel="stylesheet" type="text/css" href="..\home\assets\style.css">
                <script type="text/javascript" src="..\home\assets\script.js"></script>
                
                <link rel="stylesheet" href="/affilpro/home/css/style.css?v=1.1" />
    <link rel="stylesheet" type="text/css" href="/affilpro/home/css/style1.css">

    <div style="margin-top:3%;margin-left:3%;" class="wrapper ">
    <button onclick="opennav()" style="align-items: flex-start ;"  type="button" id="opennav" class="opennav navhide" >
<i class="fa fa-bars"style="font-size:23px"></i> </button>
</body>
    </div>
<div id="sidebar" class="wrapper navsync">
    <nav  class="sidebar"style="
    top: 0px;
">
        <h2>Admin
        <button onclick="closenav()" type="button" id="sidebarCollapse" class="closebtn navhide" style="margin-left:30px; padding:10px;" >
        <i class="fa fa-times" aria-hidden="true"></i> </button></h2>
        <ul >
            <li id="1" name="a" class="btn"><a href="../home" onclick="myFunction()"><i class="fas fa-home"></i>Home</a></li>
            
            <li id="2" class="btn"><a href="../users" onclick="myFunction()"><i class="fas fa-user"></i>Users</a></li>
            <li id="3"class="btn"><a href="../course"onclick="myFunction()"><i class="fas fa-address-card"></i>Course</a></li>
            <li id="4"class="btn"><a href="../bankrequests"onclick="myFunction()"><i class="fas fa-landmark"></i>Bank Resquests</a></li>
            <li  id="5" class="btn"><a href="../subscription"onclick="myFunction()"><i class="fas fa-blog"></i>Subscription</a></li>
            <li  id="6"class="btn"><a href="../banner"onclick="myFunction()"><i class="fas fa-banner"></i>Banner</a></li>
            <li id="7" class="btn"><a href="../payment"onclick="myFunction()"><i class="fas fa-map-pin"></i>payments</a></li>
            <li  id="8"class="btn"><a href="../logout"><i class="fas fa-user"></i>Log Out</a></li>

        </ul> 
        <div class="social_media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
</div>
       
      
                                      
</nav>

</div>

</div>
     


</html>

<?php 

}else{

     header("Location: /affilpro/admin");

     exit();

}
?>