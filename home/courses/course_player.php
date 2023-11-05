<?php
include "../includes/db.php";

?>
<!DOCTYPE html>

<head>
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

  <title>Affilpro Course</title>
  
  <link rel="stylesheet" href="style.css">
  <?php 
session_start();
include "../includes/db.php";
$chkk=0;
$c_id=0;
$email=$_SESSION['email'];
$uid=$_SESSION['uid'];
if (isset($_SESSION['uid'])) {
$sql = "SELECT * FROM user WHERE email='$email' AND uid='$uid'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $name=$row['name'];
  $myrid=$row['myrid'];

  $mycourse=$row['coursesenroled'];
  $string = $mycourse;
                                $str_arr = explode (",", $string); 
                                    $len = sizeof($str_arr);
                                    
                                    for($i = 0; $i < $len; ++$i) {
                                    ?>
                                            <?php
                                            $c_id=$str_arr[$i];
                                            if($c_id==$_GET['id']){
                                                $chkk=1;
                                            }
                                            }
                                          }
                                          }
                                          if($chkk==1){
                                          

                                                ?>
  <?php
        if(isset($_GET['id'])&&isset($_GET['part']))
        {
            $totaltime=0;
            $cid=$_GET['id'];
            $coursetable="course".$cid;
            $part=$_GET['part'];
            $correntpart = "SELECT * FROM $coursetable  WHERE `id`='$part' ";
            $correntpart_run=mysqli_query($conn,$correntpart);

            $course = "SELECT * FROM course_available  WHERE `cid`='$cid' ";
            $course_run=mysqli_query($conn,$course);

            $cuurentcoursetable = "SELECT * FROM $coursetable";
            $cuurentcoursetable_run=mysqli_query($conn,$cuurentcoursetable);
            if(mysqli_num_rows($cuurentcoursetable_run)>0){
              foreach($cuurentcoursetable_run as $cuurentcoursetable)
              {
                $totaltime=$totaltime+$cuurentcoursetable['duration'];
              }}


        }
            ?>
















            <script>
            window.console = window.console || function(t) {};
          </script>

            
            
            <script>
            if (document.location.search.match(/type=embed/gi)) {
              window.parent.postMessage("resize", "*");
            }
          </script>


          </head>
          <?php
                                  if(mysqli_num_rows($course_run)>0){
                                      foreach($course_run as $course)
                                      {
                                        ?>
          <body translate="no" >
            <body>
            <div class="course-header">
            <?php
                      if(mysqli_num_rows($correntpart_run)>0){
                          foreach($correntpart_run as $correntpart)
                          {
                        ?>
              <div class="title"><b><?php echo$correntpart['sectionname']?></b></div>
              <?php
              }
            }?>
              <a href="/affilpro/home/courses"><div class="timer">
                Go Back
              </div></a>
            </div>
            <div class="container">
              <div class="course-player">
                <div class="course-nav-toggle">
                  <button aria-expanded="true" class="course-nav-btn">
                    <span>
                      <svg class="nav-toggle-svg" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
            <rect width="100" height="3"></rect>
            <rect y="8" width="100" height="3"></rect>
            <rect y="16" width="100" height="3"></rect>
                      </svg> 
                    </span>
                  </button>
                </div>
                <div class="course-content">
                  <?php
                      if(mysqli_num_rows($correntpart_run)>0){
                          foreach($correntpart_run as $correntpart)
                          {
                        ?>
                          <iframe id="content-frame" width="100%" height="100%" frameborder="0" src="<?php echo $correntpart['link']?>"></iframe> 
                        <?php 
          }
          }
              ?>
                            
                
                  
                    
              
                  </div>
              </div> 
              <div class="course-nav">
                <div class="course-nav-content">
                  <div class="course-completion-panel u-none">
                    <canvas id="confetti"></canvas>
                    <div class="course-complete-message">
                      <i class="fa-solid fa-circle-check fa-5x completed-course-icon"></i>
                      <div>
                      You have completed another course within this certificate.
                      
                      </div>
                      
                      <div style="display:none;">
                        Up next is Course XYZ (Required)
                        </div>
                      <div class="button-group">
                        <?php
                         $_SESSION['cid']=$cid;
                         $_SESSION['duration']=$totaltime;
                         $_SESSION['name']=$name;
                         $_SESSION['myrid']=$myrid;



                        ?>
                      <a href="ceritficate.php">  <button class="btn btn-secondary button-close">
                          Download Certificate
                        </button>
                      </a>
                      </div>
                    </div>
                  </div>
                  <div class="course-nav-header">
                    
                    <div>
                      <div class="nav-sections" role="tablist" tabindex="0">
                        <div class="section-headers" style="transform: translateX(0px);">
                          <button class="section-item selected" id="curricula" aria-selected="true" role="tab" tabindex="-1">
                            <div>
                              <div class="header-text">
                                Curricula
                              </div>  
                              <span class="header-underline"></span>
                            </div>
                          </button>
                          <button class="section-item" id="description" aria-selected="false" role="tab" tabindex="-1">
                            <div>
                              <div class="header-text">
                                Description
                              </div>  
                              <span class="header-underline"></span>
                            </div>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="course-nav-body">
                    <div id="curricula-body" class="section-body visible">
                      <div role="tabpanel" aria-labelledby="table-of-contents" class="course-list">
                        <div>
                          <div class="curricula-level">
                            <div class="curricula-level-header">
                              <div class="level-status">
                                <div class="u-flex u-align-items-center">
                                  <div class="level-progress">
                                    <div></div>
                                    <svg class="level-progress-svg complete" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" transform="rotate(-90)">
                                      <circle r="11" cx="12" cy="12" class="level-progress-circle1" stroke-width="2"></circle>
                                      <text class="level-ordinal" x="49%" y="-31%" text-anchor="middle" transform="rotate(90)">1</text>
                                      <circle r="11" cx="12" cy="12" stroke-width="2" stroke-dasharray="69.11503837897544 69.11503837897544" stroke-dashoffset="0" class="level-progress-circle2"></circle>
                                    </svg>                            
                                  </div>
                                  <div class="u-py-md">
                                  
                                        
                                    <h2 class="currciula-title u-m-0 u-p-0 u-ps-type-sm u-ps-type-weight-med"><b><?php echo $course['cname']?></b></h2>
                                  
                                    <div class="u-ps-type-xs ps-type-weight-book u-text-subtle u-flex u-align-items-center">
                                      <svg class="level-estimated-time-svg u-flex-none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <path d="M12 23.1a11.44 11.44 0 1 1 11.43-11.43c0 6.3-5.13 11.42-11.43 11.42zm0-20.87a9.44 9.44 0 0 0 0 18.87 9.44 9.44 0 0 0 0-18.87z"></path>
                                        <path d="M13 11V3.95h-2V11H4.36v2H13v-2z"></path>
                                          
                                      </svg>
                                      <?php
                                      echo $totaltime;
                                      ?> Minutes  
                                    </div> 
                                  </div>
                                </div>
                              </div>
                              <div class="level-expander">
                                <button aria-label="Collapse" class="arrow-button">
                                  <div>
                                    <div class="svg-container">
                                      <svg aria-label="caret down icon" viewBox="0 0 24 24" role="img">
                                      <path d="M12 15.41l-5-5L8.41 9 12 12.58 15.59 9 17 10.41"> </path>

                                      </svg>
                                    </div>
                                  </div>
                                </button>
                              </div>
                            </div>
                            <div class="course-group">
                            
                              <?php
                      if(mysqli_num_rows($cuurentcoursetable_run)>0){
                          foreach($cuurentcoursetable_run as $cuurentcoursetable)
                          {
                            
                              ?>
                              <a class="bgvar" href="/affilpro/home/courses/course_player.php?id=<?php echo $cid?>&part=<?php echo $cuurentcoursetable['id']?>">
                              <div class="course-details" aria-hidden="false" style="height: auto; overflow: visible; visibility: visible;">
                                <div>
                                  <button class="content-item u-flex u-align-items-stretch">
                                    <div class="content-item-circle">
                                      <div class="completed-check">
                                        <svg aria-label="completed" class="completed-check-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path d="M2.6 12.3l-1.4 1.4a1 1 0 000 1.5l6.1 6.2c.4.4 1 .4 1.4 0L23 6.9c.4-.4.4-1 0-1.4L21.6 4A1 1 0 0020 4l-12 12.3-4-4a1 1 0 00-1.5 0z"> </path>
                                        </svg>
                                        <span class="screenreader-only">(completed)</span>           
                                      </div>
                                    </div>
                                    <div class="course-details-item u-align-items-center u-flex-1">
                                      <h3 class="u-flex-1 u-ps-type-sm u-ps-type-weight-book u-truncate"> 
                                        <div class="u-flex u-align-items-center">
                                          <span class="u-truncate" title="Course Overview">
                                          <?php echo $cuurentcoursetable['sectionname']?>
                                          </span>
                                        </div>
                                      </h3>
                                      <div class="content-item_content-item-duration____h_i u-flex-none u-pl-tiny u-ps-type-xs u-ps-type-weight-book" style="
    right: 13px;
">
                                      <?php echo $cuurentcoursetable['duration']?> Minutes
                                      </div>
                                    </div>
                                  </button>
                                </div>
                              </div>
                              </a>
                              <hr>
                              <?php
                          }
                      }
              ?>
                <div class="course-details" aria-hidden="false" style="height: auto; overflow: visible; visibility: visible;">
                                <div>
                                  <button class="content-item u-flex u-align-items-stretch completed">
                                    <div class="content-item-circle">
                                      <div class="completed-check">
                                        <svg aria-label="completed" class="completed-check-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                          <path d="M2.6 12.3l-1.4 1.4a1 1 0 000 1.5l6.1 6.2c.4.4 1 .4 1.4 0L23 6.9c.4-.4.4-1 0-1.4L21.6 4A1 1 0 0020 4l-12 12.3-4-4a1 1 0 00-1.5 0z"> </path>
                                        </svg>
                                        <span class="screenreader-only">(completed)</span>           
                                      </div>
                                    </div>
                                    <div class="course-details-item u-align-items-center u-flex-1">
                                      <h3 class="u-flex-1 u-ps-type-sm u-ps-type-weight-book u-truncate"> 
                                        <div class="u-flex u-align-items-center">
                                          <span class="u-truncate" title="Course Overview">
                                            Certificate
                                          </span>
                                        </div>
                                      </h3>
                                    </div>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div id="description-body" class="section-body text">
          <?php echo $course['cdisc'] ?>          </div>       
                  </div>           
                </div>
              </div>
            </div>
            
          <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js'></script>
                <script id="rendered-js" >
          $(document).ready(function () {
            $(".course-nav-btn").click(function () {
              $(".container").toggleClass("collapsed-nav");
            });

            $(".section-item").click(function () {
              $(".section-item").removeClass("selected");
              $(this).addClass("selected");

              $(".section-body").removeClass("visible");
              $("#" + $(this)[0].id + "-body").addClass("visible");
            });

            $(".button-close").click(function () {
              $(".course-completion-panel").removeClass("u-flex");
              $(".course-completion-panel").addClass("u-none");
            });

            $(".completed").click(function () {
              $(".course-completion-panel").removeClass("u-none");
              $(".course-completion-panel").addClass("u-flex");

              resetConfetti();
              courseComplete();
            });

          });

          const canvasEl = document.querySelector('#confetti');

          var w = canvasEl.width = window.innerWidth;
          var h = canvasEl.height = window.innerHeight;
          var ctx = canvasEl.getContext('2d');
          var confNum = Math.floor(w / 4);
          var confs = [];
          var animationID = -1;

          function resetConfetti() {
            ctx.clearRect(0, 0, w, h);
            ctx.beginPath();

            if (animationID != -1) {
              cancelAnimationFrame(animationID);
            }

            confs = [];
            confs = new Array(confNum).fill().map(_ => new Confetti());
          }

          function courseComplete() {
            animationID = requestAnimationFrame(courseComplete);
            ctx.clearRect(0, 0, w, h);
            ctx.beginPath();

            confs.forEach(conf => {
              conf.update();
              conf.draw();
            });
          }

          function Confetti() {
            //construct confetti
            var colors = ['#fde132', '#009bde', '#ff6b00'];

            this.x = Math.round(Math.random() * w);
            this.y = Math.round(Math.random() * h) - h / 2;
            this.rotation = Math.random() * 360;

            var size = Math.random() * (w / 80);

            this.size = size < 10 ? 10 : size;
            this.color = colors[Math.floor(colors.length * Math.random())];
            this.speed = this.size / 6;
            this.opacity = Math.random();
            this.shiftDirection = Math.random() > 0.5 ? 1 : -1;
          }

          Confetti.prototype.update = function () {
            this.y += this.speed;

            if (this.y <= h) {
              this.x += this.shiftDirection / 3;
              this.rotation += this.shiftDirection * this.speed / 100;
            }
          };

          Confetti.prototype.draw = function () {
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, this.rotation, this.rotation + Math.PI / 2);
            ctx.lineTo(this.x, this.y);
            ctx.closePath();
            ctx.globalAlpha = this.opacity;
            ctx.fillStyle = this.color;
            ctx.fill();
          };
          //# sourceURL=pen.js
              </script>

            

          </body>

          </html>
<?php
                              }
                            }
                          }else{
                            
                            ?>
                            <script>alert("something went wrong");
                                  location.href = "/affilpro/logout"</script>
                            <?php
                          }
                            

                    ?>